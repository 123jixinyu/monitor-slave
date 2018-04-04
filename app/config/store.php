<?php

return [
    'driver' => [
        'default'  => env('DEFAULT_DRIVER', 'redis'),
        'redis'    => [
            'host'     => env('REDIS_HOST', '127.0.0.1'),
            'port'     => env('REDIS_PORT', '6379'),
            'password' => env('REDIS_PASSWORD', null),
        ],
        //'database' => [
        //    'host'     => env('DB_HOST', '127.0.0.1'),
        //    'port'     => env('DB_PORT', '3306'),
        //    'user'     => env('DB_USER', null),
        //    'password' => env('DB_PASSWORD', null),
        //]
    ]
];