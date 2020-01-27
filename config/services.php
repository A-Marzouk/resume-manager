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

    'instagram'=>[
        'client_id' => env('INSTAGRAM_APP_ID'),
        'client_secret' => env('INSTAGRAM_APP_SECRET'),
        'redirect' => env('INSTAGRAM_CALLBACK_URL')
    ],

    'google_translate'=>[
        'key' => env('GOOGLE_APPLICATION_API_KEY'),
    ],

    'google' => [
        'client_id'     => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect'      => env('GOOGLE_CALLBACK_URL'),
    ],
//
//    'github' => [
//        'client_id' => env('GITHUB_CLIENT'),
//        'client_secret' => env('GITHUB_SECRET'),
//        'redirect' => env('GITHUB_URI')
//    ],

    'github'=>[
        'client_id' => env('GITHUB_CLIENT_ID_FOR_LOGIN'),
        'client_secret' => env('GITHUB_CLIENT_SECRET_FOR_LOGIN'),
        'redirect' => env('CALLBACK_URL_FOR_LOGIN'),
    ],

    'facebook' => [
        'client_id' => env('FACEBOOK_APP_ID'),
        'client_secret' => env('FACEBOOK_APP_SECRET'),
        'redirect' => 'http://local.123workforce.me/freelancer/register/facebook/callback'
    ],

];
