<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class PortfolioGridCol4 extends Component
{
    public function render()
    {
        return view('livewire.frontend.portfolio-grid-col-4')
            ->layout('components.layouts.app', ['title' => 'Grid Col 4 – Induyst HTML Template']);
    }
}