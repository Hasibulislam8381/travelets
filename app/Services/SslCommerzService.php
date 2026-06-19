<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SslCommerzService
{
    protected string $storeId;
    protected string $storePassword;
    protected bool $isSandbox;
    protected string $baseUrl;

    public function __construct()
    {
        $this->storeId       = config('sslcommerz.store_id');
        $this->storePassword = config('sslcommerz.store_password');
        $this->isSandbox     = config('sslcommerz.sandbox', true);
        $this->baseUrl       = $this->isSandbox
            ? 'https://sandbox.sslcommerz.com'
            : 'https://securepay.sslcommerz.com';
    }

    public function initiatePayment(array $data): array
    {
        $payload = [
            'store_id'             => $this->storeId,
            'store_passwd'         => $this->storePassword,
            'total_amount'         => $data['amount'],
            'currency'             => 'BDT',
            'tran_id'              => $data['tran_id'],
            'success_url'          => route('payment.success'),
            'fail_url'             => route('payment.fail'),
            'cancel_url'           => route('payment.cancel'),
            'ipn_url'              => route('payment.ipn'),
            'cus_name'             => $data['customer_name'],
            'cus_email'            => $data['customer_email'],
            'cus_phone'            => $data['customer_phone'],
            'cus_add1'             => $data['customer_address'] ?? 'N/A',
            'cus_city'             => 'Dhaka',
            'cus_country'          => 'Bangladesh',
            'shipping_method'      => 'NO',
            'product_name'         => $data['product_name'],
            'product_category'     => $data['product_category'] ?? 'General',
            'product_profile'      => 'general',
            'num_of_item'          => $data['quantity'] ?? 1,
        ];

        $response = Http::asForm()->post(
            $this->baseUrl . '/gwprocess/v4/api.php',
            $payload
        );

        return $response->json();
    }

    public function validatePayment(string $valId): array
    {
        $response = Http::get($this->baseUrl . '/validator/api/validationserverAPI.php', [
            'val_id'       => $valId,
            'store_id'     => $this->storeId,
            'store_passwd' => $this->storePassword,
            'format'       => 'json',
        ]);

        return $response->json();
    }
}
