<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class BlogMGridCol4 extends Component
{
    public function render()
    {
        return view('livewire.frontend.blog-m-grid-col-4')
            ->layout('components.layouts.app', ['title' => 'Blog M Grid Col 4 – Induyst HTML Template']);
    }
}