<?php

namespace Evilnet\Dotpay;

use Evilnet\Dotpay\DotpayApi\DotpayApi;
use Dotenv\Exception\InvalidCallbackException;
use Evilnet\Dotpay\DotpayApi\Response;

/**
 * Class DotpayManager
 * @package Evilnet\Dotpay
 */
class DotpayManager
{
    /**
     * @var DotpayApi
     */
    private $dotpayApi;
    /**
     * @var
     */
    private $response;

    /**
     * DotpayManager constructor.
     * @param DotpayApi $dotpayApi
     */
    public function __construct(DotpayApi $dotpayApi)
    {
        $this->dotpayApi = $dotpayApi;
    }

    //It will return url for dotpay transaction

    /**
     * @param $data
     * @return mixed|string
     */
    public function createPayment($data)
    {
        return $this->dotpayApi->createPayment($data);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function refundPayment($data){
        return $this->dotpayApi->refundPayment($data);
    }


    /**
     * @return mixed
     */
    public function response()
    {
        return $this->response;
    }

    //It will listen for dotpay POST with status. We need to calculate hash and check status

    /**
     * @param array $data
     * @return Response
     */
    public function callback(array $data)
    {
        if ($this->dotpayApi->verifyCallback($data)) {
            return new Response($data);
        }
        throw new InvalidCallbackException('invalid_hash');
    }
}
