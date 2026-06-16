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
        $partners = \Illuminate\Support\Facades\File::exists(public_path('frontend/images/partner_logos')) ? \Illuminate\Support\Facades\File::files(public_path('frontend/images/partner_logos')) : [];
        
        $aboutUs = \App\Models\HomePage::where('section_type', 'about_us')->first();
        $mission = \App\Models\AboutUs::find(1);
        $vision = \App\Models\AboutUs::find(2);
        $goal = \App\Models\AboutUs::find(3);

        return view('livewire.frontend.index-2', compact('blogs', 'faqs', 'testimonials', 'partners', 'aboutUs', 'mission', 'vision', 'goal'))
            ->layout('components.layouts.app', ['title' => 'Induyst – Industry & Factory HTML Template']);
    }
}