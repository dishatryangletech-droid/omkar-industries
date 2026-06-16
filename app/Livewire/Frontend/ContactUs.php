<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class ContactUs extends Component
{
    public function render()
    {
        $generalSetting = \App\Models\GeneralSetting::first();
        $footerSetting = \Illuminate\Support\Facades\DB::table('footer_settings')->first();

        return view('livewire.frontend.contact-us', [
            'generalSetting' => $generalSetting,
            'footerSetting' => $footerSetting,
        ])->layout('components.layouts.app', ['title' => 'Contact Us – Induyst HTML Template']);
    }
}