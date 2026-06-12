<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class Faq extends Component
{
    public function render()
    {
        return view('livewire.frontend.faq')
            ->layout('components.layouts.app', ['title' => 'Faq – Induyst HTML Template']);
    }
}