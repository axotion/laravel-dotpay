<?php

namespace Evilnet\Dotpay\DotpayApi;

use Evilnet\Dotpay\DotpayApi\Requests\CreatePaymentLink;
use Evilnet\Dotpay\DotpayApi\Requests\CreateRefund;

/**
 * Class DotpayApi
 * @package Evilnet\Dotpay\DotpayApi
 */
class DotpayApi
{
    /**
     * @var
     */
    private $config;
    /**
     * @var Client
     */
    private $client;
    /**
     * @var Validator
     */
    private $validator;
    /**
     * @var UrlCreator
     */
    private $url_creator;

    /**
     * DotpayApi constructor.
     * @param $config
     */
    public function __construct($config)
    {
        $this->config = $config;
        $this->client = new Client($this->config['username'], $this->config['password'], $this->config['base_url']);
        $this->validator = new Validator($this->config['pin']);
        $this->url_creator = new UrlCreator($this->config['pin']);
    }

    /**
     * @param $payment
     * @return mixed|string
     */
    public function createPayment($payment)
    {
        return $this->getPaymentUrl($this->client->makeRequest(new CreatePaymentLink($this->config['shop_id'], $payment)));
    }

    /**
     * @param $payment
     * @return mixed
     */
    public function refundPayment($payment){
        return $this->client->makeRequest(new CreateRefund($this->config['shop_id'], $payment));
    }

    /**
     * @param $payment
     * @return mixed|string
     */
    public function getPaymentUrl($payment)
    {
        switch ($this->config['api_version']) {
            case 'dev':
            default:
                return $this->url_creator->getPaymentUrlWithCHK($payment);
                break;
            case 'legacy':
                return $this->url_creator->getPaymentUrl($payment);
                break;
        }
    }

    /**
     * @param $data
     * @return bool
     */
    public function verifyCallback($data)
    {
        return $this->validator->verify($data);
    }

}
