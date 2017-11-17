<?php

namespace Evilnet\Dotpay\DotpayApi;

class Validator
{
    private $keys = [
        'id',
        'operation_number',
        'operation_type',
        'operation_status',
        'operation_amount',
        'operation_currency',
        'operation_withdrawal_amount',
        'operation_commission_amount',
        'operation_original_amount',
        'operation_original_currency',
        'operation_datetime',
        'operation_related_number',
        'control',
        'description',
        'email',
        'p_info',
        'p_email',
        'credit_card_issuer_identification_number',
        'credit_card_masked_number',
        'credit_card_brand_codename',
        'credit_card_brand_code',
        'credit_card_id',
        'channel',
        'channel_country',
        'geoip_country',
    ];

    private $pin;

    public function __construct($pin)
    {
        $this->pin = $pin;
    }

    public function verify($data)
    {
        $concatData = '';
        foreach ($this->keys as $key) {
            if (isset($data[$key]) && strlen($data[$key])) {
                $concatData .= $data[$key];
            }
        }
        $hash = hash('sha256', $this->pin . $concatData);

        return $data['signature'] === $hash;
    }

}