<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class PortfolioMGridWide extends Component
{
    public function render()
    {
        return view('livewire.frontend.portfolio-m-grid-wide')
            ->layout('components.layouts.app', ['title' => 'M Grid Wide – Induyst HTML Template']);
    }
}