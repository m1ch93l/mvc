<?php

declare(strict_types=1);

namespace App\Core;

use RuntimeException;

/**
 * Renders PHP templates, optionally wrapped in a layout.
 */
final class View
{
    /** @var array<string, mixed> */
    private array $shared = [];

    public function __construct(private readonly string $basePath)
    {
    }

    public function share(string $key, mixed $value): void
    {
        $this->shared[$key] = $value;
    }

    /**
     * @param array<string, mixed> $data
     */
    public function render(string $view, array $data = [], string $layout = 'layouts/app'): void
    {
        $viewFile   = $this->path($view);
        $layoutFile = $this->path($layout);

        $data = array_merge($this->shared, $data);

        extract($data, EXTR_SKIP);

        require $layoutFile;
    }

    private function path(string $view): string
    {
        if (preg_match('#^[A-Za-z0-9_\-/]+$#', $view) !== 1) {
            throw new RuntimeException("Invalid view name [{$view}].");
        }

        $file = $this->basePath . '/' . $view . '.php';

        if (! is_file($file)) {
            throw new RuntimeException("View [{$view}] not found at [{$file}].");
        }

        return $file;
    }
}
