<?php

use App\User;

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

    // civ:
    'civ' => [
        'api_token' => env('CIV_API_TOKEN'),
        'client_id' => env('CIV_CLIENT_ID'),
        'client_secret' => env('CIV_CLIENT_SECRET'),
        'redirect_url' => env('CIV_REDIRECT_URL'),
        'url' => env('CIV_URL'),
        'login' => env('CIV_LOGIN_EMAIL'),
        'password' => env('CIV_LOGIN_PASS'),
    ],

    // payments:

    'stripe' => [
        'model' => User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET')
    ],
    'paypal' => [
        'mode' => env('PAYPAL_MODE'),
        'settings' => array(
            'mode' => env('PAYPAL_MODE', 'sandbox'),
            'http.ConnectionTimeOut' => 3000,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path() . '/logs/paypal.log',
            'log.LogLevel' => 'DEBUG'
        ),
        'sandbox' => [
            'client_id' => env('PAYPAL_SANDBOX_CLIENT_ID'),
            'secret' => env('PAYPAL_SANDBOX_SECRET'),
            'monthly_plan_id' => env('PAYPAL_SANDBOX_MONTHLY_PLAN_ID'),
            'yearly_plan_id' => env('PAYPAL_SANDBOX_MONTHLY_PLAN_ID'),
        ],
        'live' => [
            'client_id' => env('PAYPAL_LIVE_CLIENT_ID'),
            'secret' => env('PAYPAL_LIVE_SECRET'),
            'monthly_plan_id' => env('PAYPAL_LIVE_MONTHLY_PLAN_ID'),
            'yearly_plan_id' => env('PAYPAL_LIVE_MONTHLY_PLAN_ID'),
        ],
    ],


];
