<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class TeamMemberDetail extends Component
{
    public function render()
    {
        return view('livewire.frontend.team-member-detail')
            ->layout('components.layouts.app', ['title' => 'Monika Larson – Induyst Demo1 HTML Template']);
    }
}