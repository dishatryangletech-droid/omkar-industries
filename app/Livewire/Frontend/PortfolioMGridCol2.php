<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class PortfolioMGridCol2 extends Component
{
    public function render()
    {
        return view('livewire.frontend.portfolio-m-grid-col-2')
            ->layout('components.layouts.app', ['title' => 'M Grid Col 2 – Induyst HTML Template']);
    }
}