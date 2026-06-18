<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Industry;
use App\Models\Application;
use App\Models\Gallery;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Career;
use App\Models\JobApplication;
use App\Models\DealerInquiry;

class DashboardController extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        $industryCount = class_exists(Industry::class) ? Industry::count() : 0;
        $applicationCount = class_exists(Application::class) ? Application::count() : 0;
        $galleryCount = class_exists(Gallery::class) ? Gallery::count() : 0;
        $blogCount = class_exists(Blog::class) ? Blog::count() : 0;
        $contactCount = class_exists(Contact::class) ? Contact::count() : 0;
        $careerCount = class_exists(Career::class) ? Career::count() : 0;
        $jobAppCount = class_exists(JobApplication::class) ? JobApplication::count() : 0;
        $dealerCount = class_exists(DealerInquiry::class) ? DealerInquiry::count() : 0;

        return view('backend.dashboard', compact(
            'productCount',
            'industryCount',
            'applicationCount',
            'galleryCount',
            'blogCount',
            'contactCount',
            'careerCount',
            'jobAppCount',
            'dealerCount'
        ));
    }
}
