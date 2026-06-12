<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class OurHistory extends Component
{
    public function render()
    {
        return view('livewire.frontend.our-history')
            ->layout('components.layouts.app', ['title' => 'Our History – Induyst HTML Template']);
    }
}