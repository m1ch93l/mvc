<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\View;
use App\Models\Page;

final class HomeController extends Controller
{
    public function __construct(View $view, private readonly Page $pages)
    {
        parent::__construct($view);
    }

    public function index(): void
    {
        $this->view->render('pages/home', [
            'pageTitle'  => 'Home',
            'activePage' => 'home',
            'message'    => $this->pages->welcomeMessage(),
        ]);
    }
}
