<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class Homepage2 extends Component
{
    public function render()
    {
        return view('livewire.frontend.homepage-2')
            ->layout('components.layouts.app', ['title' => 'Induyst [2nd Demo] – Industry & Factory HTML Template']);
    }
}