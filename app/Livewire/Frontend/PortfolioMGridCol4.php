<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class PortfolioMGridCol4 extends Component
{
    public function render()
    {
        return view('livewire.frontend.portfolio-m-grid-col-4')
            ->layout('components.layouts.app', ['title' => 'M Grid Col 4 – Induyst HTML Template']);
    }
}