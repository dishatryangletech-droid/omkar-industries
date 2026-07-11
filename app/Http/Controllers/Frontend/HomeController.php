<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $blogs = \App\Models\Blog::where('status', 'Active')->orderBy('date', 'desc')->take(3)->get();
        $faqs = \App\Models\Faq::where('status', 'Active')->orderBy('sort_order', 'asc')->get();
        $testimonials = \App\Models\Testimonial::where('status', 'Active')->get();
        $partners = \Illuminate\Support\Facades\File::exists(public_path('frontend/images/partner_logos')) ? \Illuminate\Support\Facades\File::files(public_path('frontend/images/partner_logos')) : [];
        
        $aboutUs = \App\Models\HomePage::where('section_type', 'about_us')->first();
        $mission = \App\Models\AboutUs::find(1);
        $vision = \App\Models\AboutUs::find(2);
        $goal = \App\Models\AboutUs::find(3);

        $products = \App\Models\Product::where(function ($q) {
            $q->whereNull('parent_id')->orWhere('parent_id', 0);
        })->where('status', 'Active')->where('is_visible', 1)->where('slug', '!=', 'other-product-page')->get();

        $headerSettings = \Illuminate\Support\Facades\Storage::disk('local')->exists('header_settings.json') ? json_decode(\Illuminate\Support\Facades\Storage::disk('local')->get('header_settings.json'), true) : [];
        $headerProductIds = $headerSettings['all_machines'] ?? [];
        if (!empty($headerProductIds)) {
            $products = $products->sortBy(function($model) use ($headerProductIds) {
                $pos = array_search($model->id, $headerProductIds);
                return $pos === false ? 99999 : $pos;
            })->values();
        }

        $faqSection = \App\Models\HomePage::where('section_type', 'faq_section')->first();
        $homeSliders = \App\Models\Slider::where('status', 'Active')->orderBy('id')->take(3)->get();
        $slider = $homeSliders->get(0);
        $sliderTwo = $homeSliders->get(1);
        $sliderThree = $homeSliders->get(2);

        $extraSliders = \App\Models\Slider::where('status', 1)
	->whereNotIn('id', array_filter([
		$slider?->id,
		$sliderTwo?->id,
		$sliderThree?->id,
	]))
	 ->orderBy('id', 'asc')
	->get();

        $exhibitions = \App\Models\Exhibition::where('status', 'Active')->get();
        $ourClients = \App\Models\Client::where('status', 'Active')->get();
        $welcomePopup = \App\Models\WelcomePopup::where('is_active', 1)->first();

        $exhibition = $exhibitions->first(function ($ex) {
            $period = $ex->scheduled_period;
            if (empty($period)) return false;
            
            $dates = explode('-', $period);
            $endDateString = trim(end($dates));
            
            try {
                $endDate = \Carbon\Carbon::parse($endDateString);
                
                // If it's just month and year, push to end of month
                if (preg_match('/^[a-zA-Z]+\s+\d{4}$/', $endDateString)) {
                    $endDate = $endDate->endOfMonth();
                } else {
                    $endDate = $endDate->endOfDay();
                }
                
                return $endDate->isFuture() || $endDate->isToday();
            } catch (\Exception $e) {
                return false;
            }
        });

        return view('frontend.index-2', compact('blogs', 'faqs', 'testimonials', 'partners', 'aboutUs', 'mission', 'vision', 'goal', 'products', 'faqSection', 'slider', 'sliderTwo', 'sliderThree', 'extraSliders', 'exhibition', 'welcomePopup'));
    }
}
