<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class Exhibition extends Component
{
    public function render()
    {
        $exhibitions = \App\Models\Exhibition::where('status', 'Active')->latest()->get();
        return view('livewire.frontend.exhibition', compact('exhibitions'))->layout('layouts.app');
    }
}
