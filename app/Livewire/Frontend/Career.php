<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class Career extends Component
{
    public function render()
    {
        return view('livewire.frontend.career')->layout('layouts.app');
    }
}
