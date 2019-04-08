<?php

namespace Evilnet\Dotpay\DotpayApi;

/**
 * Class UrlCreator
 * @package Evilnet\Dotpay\DotpayApi
 */
class UrlCreator
{
    /**
     * @var
     */
    private $pin;

    /**
     * UrlCreator constructor.
     * @param $pin
     */
    public function __construct($pin)
    {
        $this->pin = $pin;
    }

    /**
     * @param $payment
     * @return mixed
     */
    public function getPaymentUrl($payment)
    {
        return $payment->payment_url;
    }

    /**
     * @param $payment
     * @return string
     */
    public function getPaymentUrlWithCHK($payment)
    {
        return $payment->payment_url.'&chk='.hash('sha256', ($this->pin.$payment->token));
    }

}
