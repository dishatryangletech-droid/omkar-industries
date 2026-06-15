<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class BlogGridCol3 extends Component
{
    public function render()
    {
        $blogs = \App\Models\Blog::where('status', 'Active')->orderBy('date', 'desc')->get();
        return view('livewire.frontend.blog-grid-col-3', compact('blogs'))
            ->layout('components.layouts.app', ['title' => 'Induyst – Industry & Factory HTML Template']);
    }
}