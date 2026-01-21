<?php

namespace App\Controller;

class HomeController
{
    public function index(): void
    {
        view('home/index', [
            'title' => 'Bienvenue sur ma boutique'
        ]);
    }
}
