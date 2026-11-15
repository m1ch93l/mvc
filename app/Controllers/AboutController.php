<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

final class AboutController extends Controller
{
    public function index(): void
    {
        $this->view->render('pages/about', [
            'pageTitle'  => 'About Us',
            'activePage' => 'about',
        ]);
    }
}
