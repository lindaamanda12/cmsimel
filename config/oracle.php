<?php

return [
    'oracle' => [
    'driver' => 'oracle',
    'tns' => env('DB_TNS', ''),
    'host' => env('DB_HOST', '127.0.0.1'),
    'port' => env('DB_PORT', '1521'),

    // SID
    'database' => env('DB_DATABASE', 'XE'),

    // SERVICE NAME
    'service_name' => env('DB_SERVICE_NAME', 'xepdb1'),

    'username' => env('DB_USERNAME', ''),
    'password' => env('DB_PASSWORD', ''),
    'charset' => env('DB_CHARSET', 'AL32UTF8'),
    'prefix' => '',
    'prefix_schema' => '',
    'edition' => env('DB_EDITION', 'ora$base'),
    'server_version' => env('DB_SERVER_VERSION', '18c'),
    'load_balance' => false,
    'dynamic' => [],
    ],

];
