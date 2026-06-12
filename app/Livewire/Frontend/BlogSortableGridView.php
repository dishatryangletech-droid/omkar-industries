<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class BlogSortableGridView extends Component
{
    public function render()
    {
        return view('livewire.frontend.blog-sortable-grid-view')
            ->layout('components.layouts.app', ['title' => 'Blog Sortable Grid View – Induyst HTML Template']);
    }
}