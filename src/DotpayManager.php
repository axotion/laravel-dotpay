<?php

namespace Evilnet\Dotpay;

use Evilnet\Dotpay\DotpayApi\DotpayApi;
use Dotenv\Exception\InvalidCallbackException;
use Evilnet\Dotpay\DotpayApi\Response;

class DotpayManager
{
    private $dotpayApi;
    private $response;

    public function __construct(DotpayApi $dotpayApi)
    {
        $this->dotpayApi = $dotpayApi;
    }

    //It will return url for dotpay transaction

    public function createPayment($data)
    {
        return $this->dotpayApi->createPayment($data);
    }


    public function response()
    {
        return $this->response;
    }

    //It will listen for dotpay POST with status. We need to calculate hash and check status
    public function callback(array $data)
    {
        if ($this->dotpayApi->verifyCallback($data)) {
            return new Response($data);
        }
        throw new InvalidCallbackException('invalid_hash');
    }
}