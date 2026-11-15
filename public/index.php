<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Front controller
|--------------------------------------------------------------------------
|
| Every request enters the application here. Keep this file free of
| application logic: it only boots the app and dispatches the request.
|
*/
$router = require dirname(__DIR__) . '/bootstrap/app.php';

$router->dispatch();
