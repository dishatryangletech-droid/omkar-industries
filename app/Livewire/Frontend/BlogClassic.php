<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class BlogClassic extends Component
{
    public function render()
    {
        return view('livewire.frontend.blog-classic')
            ->layout('components.layouts.app', ['title' => 'Blog Classic – Induyst HTML Template']);
    }
}