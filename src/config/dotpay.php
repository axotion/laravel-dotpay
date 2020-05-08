<?php
return [

    'api' => [
        'api_version' => 'dev',
        'username' => env('DOTPAY_USERNAME'),
        'password' => env('DOTPAY_PASSWORD'),
        'shop_id' => env('DOTPAY_SHOP_ID'),
        'pin' => env('DOTPAY_PIN'),
        'base_url' => env('DOTPAY_BASE_URL')
    ],
    'options' => [
        'url' => '127.0.0.1',
        'curl' => 'callback_url',
        'recipient' => [
            'company' => 'YourCompany',
            'address' => [
                'street' => '',
                'building_number' => '',
                'postcode' => '',
                'city' => "Warszawa"
            ]
        ],
    ]
];
