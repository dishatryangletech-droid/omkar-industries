<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class PortfolioDetailStyle01 extends Component
{
    public function render()
    {
        return view('livewire.frontend.portfolio-detail-style-01')
            ->layout('components.layouts.app', ['title' => 'Oil & Gas Industry – Induyst HTML Template']);
    }
}