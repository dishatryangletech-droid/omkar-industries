<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class Gallery extends Component
{
    public function render()
    {
        return view('livewire.frontend.gallery')
            ->layout('components.layouts.app', ['title' => 'Gallery – Induyst HTML Template']);
    }
}
