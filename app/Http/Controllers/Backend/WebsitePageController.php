<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class WebsitePageController extends Controller
{
    public function sliders(): View
    {
        return view('backend.website-pages.sliders', ['title' => 'Sliders']);
    }

    public function aboutUs(): View
    {
        return view('backend.website-pages.about-us', ['title' => 'About Us']);
    }

    public function industries(): View
    {
        return view('backend.website-pages.industries', ['title' => 'Industries']);
    }

    public function testimonials(): View
    {
        return view('backend.website-pages.testimonials', ['title' => 'Testimonials']);
    }

    public function blogs(): View
    {
        return view('backend.blogs', ['title' => 'Blogs']);
    }

    public function exhibition(): View
    {
        return view('backend.website-pages.exhibition', ['title' => 'Exhibition']);
    }

    public function contacts(): View
    {
        return view('backend.contacts', ['title' => 'Contacts']);
    }

    public function career(): View
    {
        return view('backend.website-pages.career', ['title' => 'Career']);
    }

    public function dealers(): View
    {
        return view('backend.dealers', ['title' => 'Dealers']);
    }

    public function membersPartners(): View
    {
        return view('backend.website-pages.members-partners', ['title' => 'Members/Partners']);
    }

    public function footerSettings(): View
    {
        return view('backend.website-pages.footer-settings', ['title' => 'Footer Settings']);
    }
}
