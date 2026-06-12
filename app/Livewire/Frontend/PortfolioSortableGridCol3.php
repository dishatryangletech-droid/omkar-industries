<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class PortfolioSortableGridCol3 extends Component
{
    public function render()
    {
        return view('livewire.frontend.portfolio-sortable-grid-col-3')
            ->layout('components.layouts.app', ['title' => 'Sortable Grid Col 3 – Induyst HTML Template']);
    }
}