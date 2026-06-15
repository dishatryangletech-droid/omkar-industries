<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class Index2 extends Component
{
    public function render()
    {
        $blogs = \App\Models\Blog::where('status', 'Active')->orderBy('date', 'desc')->take(3)->get();
        $faqs = \App\Models\Faq::where('status', 'Active')->orderBy('sort_order', 'asc')->get();
        $testimonials = \App\Models\Testimonial::where('status', 'Active')->get();
        return view('livewire.frontend.index-2', compact('blogs', 'faqs', 'testimonials'))
            ->layout('components.layouts.app', ['title' => 'Induyst – Industry & Factory HTML Template']);
    }
}