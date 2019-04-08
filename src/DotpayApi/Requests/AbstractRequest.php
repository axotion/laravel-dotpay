<?php

namespace Evilnet\Dotpay\DotpayApi\Requests;

class AbstractRequest
{
    public function toArray()
    {
        return get_object_vars($this);
    }
}
