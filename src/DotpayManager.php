<?php

namespace Evilnet\Dotpay;

use Evilnet\Dotpay\DotpayApi\DotpayApi;
use Dotenv\Exception\InvalidCallbackException;

class DotpayManager
{
    private $dotpayApi;

    public function __construct(DotpayApi $dotpayApi)
    {
        $this->dotpayApi = $dotpayApi;
    }

    //It will return url for dotpay transaction

    public function redirectUrl($data)
    {
        return $this->dotpayApi->getUrl($this->dotpayApi->createPaymentLink($data));
    }

    //It will listen for dotpay POST with status. We need to calculate hash and check status
    public function callback(array $data)
    {
        if ($this->dotpayApi->verifyCallback($data)) {

            $truncated_data = [
                'operation_number' => $data['operation_number'],
                'control' => $data['control'],
                'payment_email' => $data['email']
            ];
            if ($this->dotpayApi->paidStatus($data['operation_status'])) {
                //OK must by print because dotpay docs

                //It will return this data only if payment was successful
                $truncated_data_success = [
                    'operation_amount' => $data['operation_amount'],
                    'operation_datetime' => $data['operation_datetime'],
                ];
                echo 'OK';
                return array_merge($truncated_data, $truncated_data_success);
            }
            echo 'OK';
            return $truncated_data;
        }
        throw new InvalidCallbackException('invalid_hash');
    }
}