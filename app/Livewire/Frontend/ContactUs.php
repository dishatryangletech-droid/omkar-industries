<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class ContactUs extends Component
{
    public function render()
    {
        return view('livewire.frontend.contact-us')
            ->layout('components.layouts.app', ['title' => 'Contact Us – Induyst HTML Template']);
    }
}