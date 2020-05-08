<?php

namespace Evilnet\Dotpay;

use Evilnet\Dotpay\DotpayApi\DotpayApi;
use Evilnet\Dotpay\DotpayApi\Response;
use InvalidArgumentException;

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
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createPayment($data)
    {
        return $this->dotpayApi->createPayment($data);
    }

    /**
     * @param $operation_number
     * @param $data
     * @return mixed
     * @throws Exceptions\RequestIntegrityException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function refundPayment($operation_number, $data){
        return $this->dotpayApi->refundPayment($operation_number, $data);
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

        throw new InvalidArgumentException('invalid_hash');
    }
}
