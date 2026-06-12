<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class PortfolioGridNoGap extends Component
{
    public function render()
    {
        return view('livewire.frontend.portfolio-grid-no-gap')
            ->layout('components.layouts.app', ['title' => 'Grid No Gap – Induyst HTML Template']);
    }
}