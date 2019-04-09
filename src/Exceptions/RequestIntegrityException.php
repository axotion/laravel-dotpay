<?php

namespace Evilnet\Dotpay\Exceptions;

use Throwable;

class RequestIntegrityException extends \Exception {
    public function __construct($message = "Value is invalid", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
