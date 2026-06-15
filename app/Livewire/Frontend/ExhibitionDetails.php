<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class ExhibitionDetails extends Component
{
    public $exhibition;

    public function mount($id)
    {
        $this->exhibition = \App\Models\Exhibition::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.frontend.exhibition-details')->layout('layouts.app');
    }
}
