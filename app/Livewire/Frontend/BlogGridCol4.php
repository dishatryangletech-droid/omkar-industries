<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class BlogGridCol4 extends Component
{
    public function render()
    {
        return view('livewire.frontend.blog-grid-col-4')
            ->layout('components.layouts.app', ['title' => 'Blog Grid Col 4 – Induyst HTML Template']);
    }
}