<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class Gallery extends Component
{
    public function render()
    {
        $galleries = \App\Models\Gallery::where('status', 'active')->get();
        return view('livewire.frontend.gallery', compact('galleries'))
            ->layout('components.layouts.app', ['title' => 'Gallery – Omkar Industries']);
    }
}
