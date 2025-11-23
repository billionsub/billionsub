<?php

namespace App\Http\Controllers;

use App\Model\Transaction;
use App\Providers\NotificationServiceProvider;
use App\Helpers\PaymentHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class BtcpayWebhookController extends Controller
{
    public function __invoke(Request $request, PaymentHelper $paymentHelper)
    {
        Log::info('BTCPay webhook debug', [
    'has_secret' => !empty(env('BTCPAY_WEBHOOK_SECRET')),
    'sig'        => $request->header('BTCPAY-SIG'),
    'raw'        => $request->getContent(),
]);

        $secret = env('BTCPAY_WEBHOOK_SECRET', '');
        $sig    = $request->header('BTCPAY-SIG'); // format: sha256=<hex>
        $raw    = $request->getContent();

        if (!$secret || !$sig || !str_contains($sig, '=')) {
            Log::warning('BTCPay: missing signature/secret', ['hasSecret' => (bool)$secret, 'sig' => $sig]);
            return response('Missing signature', 400);
        }

        [$algo, $hash] = explode('=', $sig, 2);
        if ($algo !== 'sha256' || !hash_equals(hash_hmac('sha256', $raw, $secret), $hash)) {
            Log::warning('BTCPay: invalid signature');
            return response('Invalid signature', 400);
        }

        $event = $request->json()->all();
        Log::info('BTCPay webhook received', ['type' => $event['type'] ?? null, 'invoiceId' => $event['invoiceId'] ?? null]);

        if (($event['type'] ?? '') !== 'InvoiceSettled') {
            return response()->noContent();
        }

        $invoiceId = $event['invoiceId'] ?? null;
        $txId = null;

        // 1) Try to read orderId from event metadata (if present)
        $metaOrderId = $event['metadata']['orderId'] ?? null;
        if ($metaOrderId && str_starts_with($metaOrderId, 'TX-')) {
            $txId = substr($metaOrderId, 3);
        }

        // 2) Fallback: fetch invoice to read metadata if orderId not present
        if (!$txId && $invoiceId) {
            try {
                $host    = rtrim(env('BTCPAY_HOST'), '/');
                $storeId = env('BTCPAY_STORE_ID');
                $apiKey  = env('BTCPAY_API_KEY');

                $invoice = Http::withHeaders(['Authorization' => "token $apiKey"])
                    ->get("$host/api/v1/stores/$storeId/invoices/$invoiceId")
                    ->throw()
                    ->json();

                $invOrderId = $invoice['metadata']['orderId'] ?? null;
                if ($invOrderId && str_starts_with($invOrderId, 'TX-')) {
                    $txId = substr($invOrderId, 3);
                }
            } catch (\Throwable $e) {
                Log::error('BTCPay: failed fetching invoice for metadata', ['err' => $e->getMessage(), 'invoiceId' => $invoiceId]);
            }
        }

        // 3) Optional second fallback: if you saved btcpay_invoice_id on transactions
        if (!$txId && $invoiceId) {
            $tx = Transaction::query()->where('btcpay_invoice_id', $invoiceId)->first();
            if ($tx) {
                $txId = (string)$tx->id;
            }
        }

        if (!$txId) {
            Log::warning('BTCPay: could not resolve transaction id from webhook', ['invoiceId' => $invoiceId]);
            return response()->noContent();
        }

        $transaction = Transaction::query()->where('id', $txId)->with('subscription')->first();
        if (!$transaction) {
            Log::warning('BTCPay: transaction not found', ['txId' => $txId, 'invoiceId' => $invoiceId]);
            return response()->noContent();
        }

        // Idempotent finalize
        if (in_array($transaction->status, [
            Transaction::INITIATED_STATUS,
            Transaction::PENDING_STATUS,
            Transaction::PARTIALLY_PAID_STATUS
        ], true)) {
            $transaction->status = Transaction::APPROVED_STATUS;
            // Optional: persist invoice id if you didn’t earlier
            if ($invoiceId && empty($transaction->btcpay_invoice_id ?? null)) {
                $transaction->btcpay_invoice_id = $invoiceId;
            }
            $transaction->save();

            $paymentHelper->creditReceiverForTransaction($transaction);
            NotificationServiceProvider::createTipNotificationByTransaction($transaction);
            NotificationServiceProvider::createPPVNotificationByTransaction($transaction);

            Log::info('BTCPay: transaction approved', ['txId' => $txId, 'invoiceId' => $invoiceId]);
        } else {
            Log::info('BTCPay: duplicate or already finalized', ['txId' => $txId, 'status' => $transaction->status]);
        }

        return response()->noContent(); // MUST return 2xx so BTCPay stops retrying
    }
}
