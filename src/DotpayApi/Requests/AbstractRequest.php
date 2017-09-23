<?php

namespace Evilnet\Dotpay\DotpayApi\Requests;

class AbstractRequest
{
    protected $shop_id;

    public function __construct($shop_id)
    {
        $this->shop_id = $shop_id;
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}