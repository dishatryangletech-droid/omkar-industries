<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class Certificates extends Component
{
    public function render()
    {
        return view('livewire.frontend.certificates')
            ->layout('components.layouts.app', ['title' => 'Certificates – Induyst HTML Template']);
    }
}