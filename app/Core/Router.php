<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Maps a page name (the "?page=" query string) to a controller action.
 */
final class Router
{
    /** @var array<string, array{class-string<Controller>, string}> */
    private array $routes = [];

    public function __construct(private readonly Container $container)
    {
    }

    /**
     * @param array{class-string<Controller>, string} $action
     */
    public function get(string $page, array $action): void
    {
        $this->routes[$page] = $action;
    }

    public function dispatch(): void
    {
        $page = $_GET['page'] ?? 'home';

        if (! is_string($page) || ! isset($this->routes[$page])) {
            $this->notFound();

            return;
        }

        [$controller, $method] = $this->routes[$page];

        $this->container->get($controller)->{$method}();
    }

    private function notFound(): void
    {
        http_response_code(404);

        $this->container->get(View::class)->render('pages/404', [
            'pageTitle' => 'Page Not Found',
        ]);
    }
}
