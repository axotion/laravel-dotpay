<?php

namespace Evilnet\Dotpay\DotpayApi;

/**
 * Class Response
 * @package Evilnet\Dotpay\DotpayApi
 */
class Response
{
    /**
     * @var
     */
    private $data;

    /**
     * Response constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getControl()
    {
        return $this->data['control'];
    }

    /**
     * @return mixed
     */
    public function getOperationNumber()
    {
        return $this->data['operation_number'];
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->data['email'];
    }

    /**
     * @return mixed
     */
    public function getOperationAmount()
    {
        return $this->data['operation_amount'];
    }

    /**
     * @return mixed
     */
    public function getOperationCurrency()
    {
        return $this->data['operation_currency'];
    }

    /**
     * @return mixed
     */
    public function getOperationDateTime()
    {
        return $this->data['operation_datetime'];
    }

    /**
     * @return mixed
     */
    public function getOperationStatus()
    {
        return $this->data['operation_status'];
    }

}
