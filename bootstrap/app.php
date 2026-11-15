<?php

declare(strict_types=1);

use App\Core\Container;
use App\Core\Database;
use App\Core\Router;
use App\Core\View;

define('BASE_PATH', dirname(__DIR__));

/*
|--------------------------------------------------------------------------
| Autoloading
|--------------------------------------------------------------------------
|
| Composer's autoloader is used when dependencies are installed, otherwise a
| lightweight PSR-4 autoloader keeps the project working out of the box.
|
*/
$composerAutoload = BASE_PATH . '/vendor/autoload.php';

if (is_file($composerAutoload)) {
    require $composerAutoload;
} else {
    spl_autoload_register(static function (string $class): void {
        $prefix = 'App\\';

        if (! str_starts_with($class, $prefix)) {
            return;
        }

        $file = BASE_PATH . '/app/' . str_replace('\\', '/', substr($class, strlen($prefix))) . '.php';

        if (is_file($file)) {
            require $file;
        }
    });
}

/*
|--------------------------------------------------------------------------
| Environment
|--------------------------------------------------------------------------
*/
(function (string $file): void {
    if (! is_file($file)) {
        return;
    }

    foreach (file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        $line = trim($line);

        if ($line === '' || str_starts_with($line, '#') || ! str_contains($line, '=')) {
            continue;
        }

        [$key, $value] = explode('=', $line, 2);

        $key   = trim($key);
        $value = trim($value);

        if ($value !== '' && ($value[0] === '"' || $value[0] === "'") && $value[0] === substr($value, -1)) {
            $value = substr($value, 1, -1);
        }

        $_ENV[$key] ??= $value;
    }
})(BASE_PATH . '/.env');

if (! function_exists('env')) {
    function env(string $key, mixed $default = null): mixed
    {
        $value = $_ENV[$key] ?? getenv($key);

        if ($value === false || $value === null) {
            return $default;
        }

        return match (strtolower((string) $value)) {
            'true', '(true)'   => true,
            'false', '(false)' => false,
            'null', '(null)'   => null,
            'empty', '(empty)' => '',
            default            => $value,
        };
    }
}

/*
|--------------------------------------------------------------------------
| Application
|--------------------------------------------------------------------------
*/
$appConfig = require BASE_PATH . '/config/app.php';

date_default_timezone_set($appConfig['timezone']);
error_reporting(E_ALL);
ini_set('display_errors', $appConfig['debug'] ? '1' : '0');

$container = new Container();

$view = new View($appConfig['views']);
$view->share('appName', $appConfig['name']);

$container->instance(Container::class, $container);
$container->instance(View::class, $view);
$container->bind(Database::class, static fn (): Database => new Database(
    require BASE_PATH . '/config/database.php'
));

set_exception_handler(static function (Throwable $exception) use ($appConfig, $view): void {
    $logDirectory = BASE_PATH . '/storage/logs';

    if (! is_dir($logDirectory)) {
        mkdir($logDirectory, 0775, true);
    }

    error_log(
        sprintf("[%s] %s\n", date('Y-m-d H:i:s'), $exception),
        3,
        $logDirectory . '/app.log'
    );

    http_response_code(500);

    $view->render('pages/error', [
        'pageTitle' => 'Server Error',
        'message'   => $appConfig['debug']
            ? $exception->getMessage()
            : 'Something went wrong. Please try again later.',
        'debug'     => $appConfig['debug'],
    ]);
});

$router = new Router($container);

(require BASE_PATH . '/routes/web.php')($router);

return $router;
