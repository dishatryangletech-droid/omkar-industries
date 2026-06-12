<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class PortfolioGridCol3 extends Component
{
    public function render()
    {
        return view('livewire.frontend.portfolio-grid-col-3')
            ->layout('components.layouts.app', ['title' => 'Grid Col 3 – Induyst HTML Template']);
    }
}