<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class BtcpayService
{
    protected string $host;
    protected string $storeId;
    protected string $apiKey;

    public function __construct()
    {
        $this->host    = rtrim(env('BTCPAY_HOST'), '/');
        $this->storeId = env('BTCPAY_STORE_ID');
        $this->apiKey  = env('BTCPAY_API_KEY');
    }

    public function createInvoice(float $amount, string $currency, string $orderId, ?string $redirectUrl = null): array
    {
        $payload = [
            'amount'   => $amount,
            'currency' => $currency,
            'metadata' => [
                'orderId' => $orderId,
            ],
        ];

        if ($redirectUrl) {
            $payload['checkout'] = [
                'redirectURL' => $redirectUrl,
            ];
        }

        $response = Http::withHeaders([
            'Authorization' => 'token ' . $this->apiKey,
        ])->post(
            $this->host . "/api/v1/stores/{$this->storeId}/invoices",
            $payload
        )->throw()->json();

        return $response;
    }
}
