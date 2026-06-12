<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class PortfolioSortableGridCol4 extends Component
{
    public function render()
    {
        return view('livewire.frontend.portfolio-sortable-grid-col-4')
            ->layout('components.layouts.app', ['title' => 'Sortable Grid Col 4 – Induyst HTML Template']);
    }
}