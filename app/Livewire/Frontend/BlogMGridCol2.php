<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class BlogMGridCol2 extends Component
{
    public function render()
    {
        return view('livewire.frontend.blog-m-grid-col-2')
            ->layout('components.layouts.app', ['title' => 'Blog M Grid Col 2 – Induyst HTML Template']);
    }
}