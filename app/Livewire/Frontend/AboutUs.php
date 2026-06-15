<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class AboutUs extends Component
{
    public function render()
    {
        $testimonials = \App\Models\Testimonial::where('status', 'Active')->get();
        return view('livewire.frontend.about-us', compact('testimonials'))
            ->layout('components.layouts.app', ['title' => 'About Us – Induyst HTML Template']);
    }
}