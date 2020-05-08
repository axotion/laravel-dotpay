<?php

namespace Evilnet\Dotpay\DotpayApi\Contracts;

/**
 * Interface IRequest
 * @package Evilnet\Dotpay\DotpayApi\Contracts
 */
interface IRequest
{
    /**
     * @return mixed
     */
    public function toArray();

    /**
     * @return mixed
     */
    public function method();

    /**
     * @return mixed
     */
    public function path();
}
