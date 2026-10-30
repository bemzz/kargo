<?php

return [
    // KarGo OpenAPI production endpoint
    'base_url' => env('KARGO_BASE_URL', 'https://openapi.kargocash.com'),
    'app_id' => env('KARGO_APP_ID', ''),
    'app_token' => env('KARGO_APP_TOKEN', ''),
    'timeout' => (int) env('KARGO_TIMEOUT', 30),
    'connect_timeout' => (int) env('KARGO_CONNECT_TIMEOUT', 10),
    'verify_ssl' => (bool) env('KARGO_VERIFY_SSL', true),
];
