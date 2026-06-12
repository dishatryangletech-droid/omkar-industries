<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class ServiceDetails extends Component
{
    public function render()
    {
        return view('livewire.frontend.service-details')
            ->layout('components.layouts.app', ['title' => 'Machine Analysis – Induyst HTML Template']);
    }
}