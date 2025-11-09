<?php

namespace App\Services;

use BTCPayServer\Client;
use BTCPayServer\Util\Invoice;
use BTCPayServer\Util\Money;

class BTCPayService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client(config('btcpay.host'), config('btcpay.api_key'));
    }

    public function createInvoice($amount, $currency, $orderId)
    {
        $invoiceData = [
            'price' => $amount,
            'currency' => $currency,
            'metadata' => [
                'orderId' => $orderId,
            ],
        ];

        $invoice = $this->client->createInvoice($invoiceData);
        return $invoice;
    }

    public function getInvoice($invoiceId)
    {
        return $this->client->getInvoice($invoiceId);
    }
}
