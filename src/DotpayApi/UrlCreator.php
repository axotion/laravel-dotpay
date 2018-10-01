<?php

namespace Evilnet\Dotpay\DotpayApi;

/**
 * Class UrlCreator
 * @package Evilnet\Dotpay\DotpayApi
 */
class UrlCreator
{
    private $pin;

    public function __construct($pin)
    {
        $this->pin = $pin;
    }

    public function getPaymentUrl($payment)
    {
        return $payment->payment_url;
    }

    public function getPaymentUrlWithCHK($payment)
    {
        return $payment->payment_url.'&chk='.hash('sha256', ($this->pin.$payment->token));
    }

}