<?php

declare(strict_types=1);

use App\Controllers\AboutController;
use App\Controllers\HomeController;
use App\Core\Router;

return static function (Router $router): void {
    $router->get('home', [HomeController::class, 'index']);
    $router->get('about', [AboutController::class, 'index']);
};
