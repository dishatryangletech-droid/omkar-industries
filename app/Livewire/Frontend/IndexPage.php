<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class IndexPage extends Component
{
    public function render()
    {
        return view('livewire.frontend.index')
            ->layout('components.layouts.app', ['title' => 'Induyst – Industry & Factory HTML Template']);
    }
}