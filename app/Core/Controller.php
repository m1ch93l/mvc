<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Base controller, gives every controller access to the view renderer.
 */
abstract class Controller
{
    public function __construct(protected readonly View $view)
    {
    }
}
