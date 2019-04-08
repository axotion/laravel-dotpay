<?php

namespace Evilnet\Dotpay\DotpayApi\Requests;

use Evilnet\Dotpay\DotpayApi\Contracts\IRequest;

/**
 * Class CreateRefund
 * @package Evilnet\Dotpay\DotpayApi\Requests
 */
class CreateRefund extends AbstractRequest implements IRequest
{
    /**
     * @var
     */
    protected $amount;

    /**
     * @var
     */
    protected $description;

    /**
     * @var
     */
    protected $control;

    /**
     * @var
     */
    protected $operation_number;

    /**
     * CreateRefund constructor.
     * @param $operation_number
     * @param $data
     */
    public function __construct($operation_number, $data)
    {
        $this->operation_number = $operation_number;
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * @return string
     */
    public function method()
    {
        return 'POST';
    }

    /**
     * @return string
     */
    public function path()
    {
        return 'api/v3/payments/'.$this->operation_number.'/refund/';
    }
}
