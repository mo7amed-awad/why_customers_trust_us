<?php

return [

    'defaults' => [
        'guard' => 'admin',
        'passwords' => 'admins',
    ],

    'guards' => [
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
        'user' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'brand' => [
            'driver' => 'session',
            'provider' => 'brands',
        ],

    ],

    'passwords' => [
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'brands' => [
            'provider' => 'brands',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],

    ],

    'providers' => [
        'admins' => [
            'driver' => 'eloquent',
            'model' => \Modules\Admin\Entities\Model::class,
        ],
        'clients' => [
            'driver' => 'eloquent',
            'model' => \Modules\Client\Entities\Model::class,
        ],
        'brands' => [
            'driver' => 'eloquent',
            'model' => \Modules\Brand\Entities\Model::class,
        ],
        'users' => [
            'driver' => 'eloquent',
            'model' => \Modules\User\Entities\Model::class,
        ],

    ],

    'password_timeout' => 10800,

];
