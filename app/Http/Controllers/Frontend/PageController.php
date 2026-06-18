<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function aboutUs()
    {
        $testimonials = \App\Models\Testimonial::where('status', 'Active')->get();
        $partners = \Illuminate\Support\Facades\File::exists(public_path('frontend/images/partner_logos'))
            ? \Illuminate\Support\Facades\File::files(public_path('frontend/images/partner_logos'))
            : [];
        $teamMembers = \App\Models\TeamPartner::where('type', 'Member')->where('status', 'Active')->get();
        $pageBannerImage = asset('frontend/images/bg/titlebar-bg.jpg');

        $aboutUs = \App\Models\HomePage::where('section_type', 'about_us')->first();
        $mission  = \App\Models\AboutUs::find(1);
        $vision   = \App\Models\AboutUs::find(2);
        $goal     = \App\Models\AboutUs::find(3);

        return view('frontend.about-us', compact(
            'testimonials', 'partners', 'teamMembers', 'pageBannerImage',
            'aboutUs', 'mission', 'vision', 'goal'
        ));
    }

    public function ourHistory()
    {
        return view('frontend.our-history');
    }

    public function certificates()
    {
        return view('frontend.certificates');
    }
}
