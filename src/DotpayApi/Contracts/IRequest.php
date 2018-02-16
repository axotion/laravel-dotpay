<?php

namespace Evilnet\Dotpay\DotpayApi\Contracts;

interface IRequest
{
    public function toArray();
    public function method();
    public function path();
}
