<?php
/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */

return [
    'mode'    => 'sandbox', // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    'sandbox' => [
        'username'    => 'aziz_api1.ontime.sa',
        'password'    => 'XS7RPS6F7YM9SHP6',
        'secret'      => 'AFcWxV21C7fd0v3bYYYRCpSSRl31AY4HJlUNt0.w5tN5lWdz4zy2JGDI',
        'certificate' => 'C:\xampp\htdocs\OnTime\config\cacert.pem' ,
        'app_id'      => 'aziz_api1.ontime.sa', // Used for testing Adaptive Payments API in sandbox mode
    ],
    'live' => [
        'username'    => env('PAYPAL_LIVE_API_USERNAME', ''),
        'password'    => env('PAYPAL_LIVE_API_PASSWORD', ''),
        'secret'      => env('PAYPAL_LIVE_API_SECRET', ''),
        'certificate' => env('PAYPAL_LIVE_API_CERTIFICATE', ''),
        'app_id'      => '', // Used for Adaptive Payments API
    ],

    'payment_action' => 'Sale', // Can only be 'Sale', 'Authorization' or 'Order'
    'currency'       => 'USD',
    'notify_url'     => '', // Change this accordingly for your application.
    'locale'         => '', // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
];
