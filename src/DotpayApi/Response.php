<?php

namespace Evilnet\Dotpay\DotpayApi;

class Response
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getControl()
    {
        return $this->data['control'];
    }

    public function getOperationNumber()
    {
        return $this->data['operation_number'];
    }

    public function getEmail()
    {
        return $this->data['email'];
    }

    public function getOperationAmount()
    {
        return $this->data['operation_amount'];
    }

    public function getOperationDateTime()
    {
        return $this->data['operation_datetime'];
    }

    public function getOperationStatus()
    {
        return $this->data['operation_status'];
    }

}