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

    //GOOGLE API
    'google' => [
        'client_id'     => env('GOOGLE_CLIENT_ID','1076010884656-sjoelcc4p9teqit0l6d65s9ld2jg7esh.apps.googleusercontent.com'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET','Sy0KfRpN4HFZcckoIjDlTNWA'),
        'redirect'      => env('GOOGLE_REDIRECT','http://127.0.0.1/CheckImage/public/app/google/callback'),
    ],
];
