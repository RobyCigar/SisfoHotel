<?php

return [
    'merchant_id' => env('MIDTRANS_MERCHANT_ID'),
    'client_key' => env('MIDTRANS_CLIENT_KEY'),
    'server_key' => env('MIDTRANS_SERVER_KEY'),
    'notification_url' => 'http://localhost:8000/notification',

    'is_production' => false,
    'is_sanitized' => false,
    'is_3ds' => false,
];