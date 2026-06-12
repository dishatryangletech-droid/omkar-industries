<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class OurTeam extends Component
{
    public function render()
    {
        return view('livewire.frontend.our-team')
            ->layout('components.layouts.app', ['title' => 'Our Team – Induyst HTML Template']);
    }
}