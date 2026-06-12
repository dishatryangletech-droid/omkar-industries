<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class PortfolioMGridCol3 extends Component
{
    public function render()
    {
        return view('livewire.frontend.portfolio-m-grid-col-3')
            ->layout('components.layouts.app', ['title' => 'M Grid Col 3 – Induyst HTML Template']);
    }
}