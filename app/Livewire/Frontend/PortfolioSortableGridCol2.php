<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class PortfolioSortableGridCol2 extends Component
{
    public function render()
    {
        return view('livewire.frontend.portfolio-sortable-grid-col-2')
            ->layout('components.layouts.app', ['title' => 'Sortable Grid Col 2 – Induyst HTML Template']);
    }
}