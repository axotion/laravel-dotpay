<?php

namespace Evilnet\Dotpay\DotpayApi;

use Evilnet\Dotpay\DotpayApi\Requests\CreatePaymentLink;

class DotpayApi
{
    private $config;
    private $client;
    private $validator;
    private $url_creator;

    public function __construct($config)
    {
        $this->config = $config;
        $this->client = new Client($this->config['username'], $this->config['password'], $this->config['base_url']);
        $this->validator = new Validator($this->config['pin']);
        $this->url_creator = new UrlCreator($this->config['pin']);
    }

    public function createPayment($payment)
    {
        return $this->getPaymentUrl($this->client->makeRequest(new CreatePaymentLink($this->config['shop_id'], $payment)));
    }

    public function getPaymentUrl($payment)
    {
        switch ($this->config['api_version']) {
            case 'dev':
                return $this->url_creator->getPaymentUrlWithCHK($payment);
                break;
            case 'legacy':
                return $this->url_creator->getPaymentUrl($payment);
            default:
                break;
        }

    }

    public function verifyCallback($data)
    {
        return $this->validator->verify($data);
    }

}