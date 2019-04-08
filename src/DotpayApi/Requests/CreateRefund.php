<?php

namespace Evilnet\Dotpay\DotpayApi\Requests;

use Evilnet\Dotpay\DotpayApi\Contracts\IRequest;
use Evilnet\Dotpay\Exceptions\RequestIntegrityException;

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
     * @throws RequestIntegrityException
     */
    public function __construct($operation_number, $data)
    {
        if(!$operation_number){
            throw new RequestIntegrityException("Operation number is not set");
        }

        $this->operation_number = $operation_number;

        foreach ($data as $key => $value) {
            if(!$value || is_numeric($value) && $value <= 0){
                throw new RequestIntegrityException();
            }
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
