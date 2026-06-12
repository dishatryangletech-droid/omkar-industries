<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class Services extends Component
{
    public function render()
    {
        return view('livewire.frontend.services')
            ->layout('components.layouts.app', ['title' => 'Services – Induyst HTML Template']);
    }
}