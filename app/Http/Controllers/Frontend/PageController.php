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

    public function gallery()
    {
        $galleries = \App\Models\Gallery::where('status', 'active')->get();
        return view('frontend.gallery', compact('galleries'));
    }

    public function blogs()
    {
        $blogs = \App\Models\Blog::where('status', 'Active')->orderBy('date', 'desc')->get();
        return view('frontend.blogs', compact('blogs'));
    }

    public function blogDetail($slug)
    {
        $blog     = \App\Models\Blog::where('slug', $slug)->firstOrFail();
        $previous = \App\Models\Blog::where('id', '<', $blog->id)->where('status', 'Active')->orderBy('id', 'desc')->first();
        $next     = \App\Models\Blog::where('id', '>', $blog->id)->where('status', 'Active')->orderBy('id', 'asc')->first();
        return view('frontend.blog-detail', compact('blog', 'previous', 'next'));
    }

    public function contactUs()
    {
        $generalSetting = \App\Models\GeneralSetting::first();
        $footerSetting = \Illuminate\Support\Facades\DB::table('footer_settings')->first();

        return view('frontend.contact-us', [
            'generalSetting' => $generalSetting,
            'footerSetting' => $footerSetting,
        ]);
    }

    public function contactSubmit(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        \App\Models\Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
            'status' => 'New',
        ]);

        return redirect()->back()->with('success', 'Thank you for filling the form. Our team will contact you soon !!!');
    }

    public function jobApplicationSubmit(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'career_id' => 'required|exists:careers,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $data = $request->except('resume');
        
        if ($request->hasFile('resume')) {
            $data['resume'] = $request->file('resume')->store('resumes', 'public');
        }
        
        $data['status'] = 'New';
        
        \App\Models\JobApplication::create($data);

        return redirect()->back()->with('success', 'Your application has been submitted successfully.');
    }

    public function career()
    {
        $careers = \App\Models\Career::where('status', 'Active')->latest()->get();
        return view('frontend.career', compact('careers'));
    }

    public function exhibition()
    {
        $exhibitions = \App\Models\Exhibition::where('status', 'Active')->latest()->get();
        return view('frontend.exhibition', compact('exhibitions'));
    }

    public function exhibitionDetails($id)
    {
        $exhibition = \App\Models\Exhibition::findOrFail($id);
        return view('frontend.exhibition-details', compact('exhibition'));
    }
}
