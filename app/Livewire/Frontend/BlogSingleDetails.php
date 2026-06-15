<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class BlogSingleDetails extends Component
{
    public $blog;
    public $previous;
    public $next;

    public function mount($id)
    {
        $this->blog = \App\Models\Blog::findOrFail($id);
        $this->previous = \App\Models\Blog::where('id', '<', $this->blog->id)->where('status', 'Active')->orderBy('id', 'desc')->first();
        $this->next = \App\Models\Blog::where('id', '>', $this->blog->id)->where('status', 'Active')->orderBy('id', 'asc')->first();
    }

    public function render()
    {
        return view('livewire.frontend.blog-single-details', [
            'blog' => $this->blog,
            'previous' => $this->previous,
            'next' => $this->next
        ])->layout('components.layouts.app', ['title' => $this->blog->title . ' – Induyst Template']);
    }
}