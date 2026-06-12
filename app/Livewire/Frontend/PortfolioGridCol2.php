<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class PortfolioGridCol2 extends Component
{
    public function render()
    {
        return view('livewire.frontend.portfolio-grid-col-2')
            ->layout('components.layouts.app', ['title' => 'Grid Col 2 – Induyst HTML Template']);
    }
}