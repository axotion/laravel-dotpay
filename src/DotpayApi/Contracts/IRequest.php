<?php

namespace Evilnet\Dotpay\Contracts;

interface IRequest
{
    public function toArray();
    public function method();
    public function path();
}