<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class BlogSingleDetails extends Component
{
    public function render()
    {
        return view('livewire.frontend.blog-single-details')
            ->layout('components.layouts.app', ['title' => 'Importance of Quality and Testing in Modern Factories – Induyst Demo1 HTML Template']);
    }
}