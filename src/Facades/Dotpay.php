<?php

namespace Evilnet\Dotpay\Facades;

use Illuminate\Support\Facades\Facade;

class Dotpay extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'dotpay';
    }
}