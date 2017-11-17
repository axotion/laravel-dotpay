<?php

namespace Evilnet\Dotpay\DotpayApi;

class StatusMapper
{
    private $statuses = [
        'completed' => true,
        'rejected' => false,
    ];

    public function map($status)
    {
            if (in_array($status,array_keys($this->statuses))) {
                return $this->statuses[$status];
            }
            throw new \InvalidArgumentException('Status not found');
    }
}