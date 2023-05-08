<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'cards' => $this->getCards(),
        ]);
    }

    public function getCards(): array
    {
        return [
            (object) [
                'icon' => 'img',
                'title' => 'Views',
            ],
            (object) [
                'icon' => 'img',
                'title' => 'Vehicles',
            ],
            (object) [
                'icon' => 'img',
                'title' => 'Valuation',
            ],
            (object) [
                'icon' => 'img',
                'title' => 'Sales',
            ],
        ];
    }
}
