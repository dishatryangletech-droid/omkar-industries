<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class BlogMGridCol3 extends Component
{
    public function render()
    {
        return view('livewire.frontend.blog-m-grid-col-3')
            ->layout('components.layouts.app', ['title' => 'Blog M Grid Col 3 – Induyst HTML Template']);
    }
}