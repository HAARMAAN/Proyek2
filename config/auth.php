<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'), // Default tetap web
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    */

    'guards' => [
        // Guard 'web' sekarang kita tujukan untuk ADMIN (karena pakai tabel users)
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        // Guard 'pelanggan' untuk Client Luna Home Beauty
        'pelanggan' => [
            'driver' => 'session',
            'provider' => 'pelanggan_provider',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    */

    'providers' => [
        // Provider untuk Admin
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class, 
        ],

        // Provider untuk Pelanggan (Arahkan ke Model yang sama)
        'pelanggan_provider' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class, // Ganti ini ke User::class
        ],
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
        'pelanggan' => [
            'provider' => 'pelanggan_provider',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];