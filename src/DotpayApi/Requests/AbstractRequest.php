<?php

namespace Evilnet\Dotpay\DotpayApi\Requests;

/**
 * Class AbstractRequest
 * @package Evilnet\Dotpay\DotpayApi\Requests
 */
class AbstractRequest
{
    /**
     * @return array
     */
    public function toArray()
    {
        return get_object_vars($this);
    }
}
