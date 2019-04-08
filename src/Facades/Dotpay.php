<?php

namespace Evilnet\Dotpay\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Dotpay
 * @package Evilnet\Dotpay\Facades
 */
class Dotpay extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'dotpay';
    }
}
