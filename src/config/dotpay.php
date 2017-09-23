<?php
return [

    'api' => [
        'username' => env('DOTPAY_USERNAME'),
        'password' => env('DOTPAY_PASSWORD'),
        'shop_id' => env('DOTPAY_SHOP_ID'),
        'pin' => env('DOTPAY_PIN'),
        'base_url' => env('DOTPAY_BASE_URL')
    ],
    'options' => [
        'url' => '127.0.0.1',
        'curl' => 'https://985646fe.ngrok.io/dotpay/status',
        'recipient' => [
            'company' => 'YourCompany',
            'address' => [
                'street' => 'JakastamUlica',
                'building_number' => '1',
                'postcode' => '33-444',
                'city' => "Warszawa"
            ]
        ],
    ]
];