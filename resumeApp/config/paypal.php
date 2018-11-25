<?php

return [
    'client_id' => env('PAYPAL_CLINT_ID'),
    'secret_id' => env('PAYPAL_SECRET_ID'),
    'settings' => [
        'mode' =>env('PAYPAL_MODE'),
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName'   => storage_path() . '/logs/paypal.log',
        'log.LogLevel'   => 'ERROR'
    ]
];