<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class Index2 extends Component
{
    public function render()
    {
        return view('livewire.frontend.index-2')
            ->layout('components.layouts.app', ['title' => 'Induyst – Industry & Factory HTML Template']);
    }
}