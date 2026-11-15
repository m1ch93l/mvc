<?php

declare(strict_types=1);

return [
    'name'     => env('APP_NAME', 'My App'),
    'env'      => env('APP_ENV', 'production'),
    'debug'    => (bool) env('APP_DEBUG', false),
    'timezone' => env('APP_TIMEZONE', 'UTC'),

    // Absolute path to the template files.
    'views'    => BASE_PATH . '/resources/views',
];
