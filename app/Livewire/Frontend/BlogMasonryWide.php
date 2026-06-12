<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class BlogMasonryWide extends Component
{
    public function render()
    {
        return view('livewire.frontend.blog-masonry-wide')
            ->layout('components.layouts.app', ['title' => 'Blog Masonry Wide – Induyst HTML Template']);
    }
}