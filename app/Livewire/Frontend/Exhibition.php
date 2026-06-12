<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class Exhibition extends Component
{
    public function render()
    {
        return view('livewire.frontend.exhibition')->layout('layouts.app');
    }
}
