<?php

namespace Evilnet\Dotpay\DotpayApi;

use Evilnet\Dotpay\DotpayApi\Requests\CreatePaymentLink;

class DotpayApi
{
    private $config;
    private $client;
    private $validator;

    public function __construct($config)
    {
        $this->config = $config;
        $this->client = new Client($this->config['username'], $this->config['password'], $this->config['base_url']);
        $this->validator = new Validator($this->config['pin']);
    }

    public function createPayment($payment)
    {
        return $this->getPaymentUrl($this->client->makeRequest(new CreatePaymentLink($this->config['shop_id'], $payment)));
    }

    public function getPaymentUrl($payment)
    {
        return $payment->payment_url;
    }

    public function verifyCallback($data)
    {
        return $this->validator->verify($data);
    }

}