<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'linkedin' => [
        'client_id' => '865ff2s2qvpkzb',
        'client_secret' => '9ql6QUkQLNZzS2J9',
        'redirect' => 'https://123workforce.com/freelancer/linkedin'
    ],
    'instagram' => [
        'client_id' => 'f877808c985d4f43ad73ae517db95151',
        'client_secret' => '066768fb9e6b4186b3a3c6eb40da33a8 ',
        'redirect' => 'https://123workforce.com/freelancer/instagram'
    ],
    'github' => [
        'client_id' => env('GITHUB_CLIENT'),
        'client_secret' => env('GITHUB_SECRET'),
        'redirect' => env('GITHUB_URI')
    ],
    'google' => [
        'key' => env('GOOGLE_APPLICATION_API_KEY'),
    ]

];
