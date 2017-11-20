<?php

return [
    'default_gateway' => 'ShetabSystem',

    'shetab_system' => [
        'sender'   => env('SHETAB_GATEWAY_SENDER', '50005000144860'),
        'username' => env('SHETAB_GATEWAY_USERNAME', ''),
        'password' => env('SHETAB_GATEWAY_PASSWORD', ''),
    ],

    'kavenegar' => [
        'sender'   => env('KAVENEGAR_GATEWAY_SENDER', '10004346'),
    ]
];
