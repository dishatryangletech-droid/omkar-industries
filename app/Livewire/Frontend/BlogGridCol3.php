<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class BlogGridCol3 extends Component
{
    public function render()
    {
        return view('livewire.frontend.blog-grid-col-3')
            ->layout('components.layouts.app', ['title' => 'Blog Grid Col 3 – Induyst HTML Template']);
    }
}