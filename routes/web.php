<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Models\Slider;
use App\Models\HomePage;
use App\Models\Testimonial;
use App\Models\Client;
use App\Models\Faq;
use App\Models\Blog;
use App\Models\TeamPartner;
use App\Models\AboutUs;
use App\Models\Product;

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
    return "Cache is cleared successfully!";
});

// Livewire Frontend Routes
Route::get('/about-us', \App\Livewire\Frontend\AboutUs::class)->name('frontend.about-us');
Route::get('/career', \App\Livewire\Frontend\Career::class)->name('frontend.career');
Route::get('/exhibition', \App\Livewire\Frontend\Exhibition::class)->name('frontend.exhibition');
Route::get('/exhibition-details', \App\Livewire\Frontend\ExhibitionDetails::class)->name('frontend.exhibition-details');
Route::get('/certificates', \App\Livewire\Frontend\Certificates::class)->name('frontend.certificates');
Route::get('/gallery', \App\Livewire\Frontend\Gallery::class)->name('frontend.gallery');
Route::get('/blog-classic', \App\Livewire\Frontend\BlogClassic::class)->name('frontend.blog-classic');
Route::get('/blogs', \App\Livewire\Frontend\BlogGridCol3::class)->name('frontend.blog-grid-col-3');
Route::get('/blog-grid-col-4', \App\Livewire\Frontend\BlogGridCol4::class)->name('frontend.blog-grid-col-4');
Route::get('/blog-m-grid-col-2', \App\Livewire\Frontend\BlogMGridCol2::class)->name('frontend.blog-m-grid-col-2');
Route::get('/blog-m-grid-col-3', \App\Livewire\Frontend\BlogMGridCol3::class)->name('frontend.blog-m-grid-col-3');
Route::get('/blog-m-grid-col-4', \App\Livewire\Frontend\BlogMGridCol4::class)->name('frontend.blog-m-grid-col-4');
Route::get('/blog-masonry-wide', \App\Livewire\Frontend\BlogMasonryWide::class)->name('frontend.blog-masonry-wide');
Route::get('/blog-detail', \App\Livewire\Frontend\BlogSingleDetails::class)->name('frontend.blog-single-details');
Route::get('/blog-sortable-grid-view', \App\Livewire\Frontend\BlogSortableGridView::class)->name('frontend.blog-sortable-grid-view');
Route::get('/contact-us', \App\Livewire\Frontend\ContactUs::class)->name('frontend.contact-us');
Route::get('/faq', \App\Livewire\Frontend\Faq::class)->name('frontend.faq');
Route::get('/homepage-2', \App\Livewire\Frontend\Homepage2::class)->name('frontend.homepage-2');
Route::get('/index-2', \App\Livewire\Frontend\Index2::class)->name('frontend.index-2');
Route::get('/', \App\Livewire\Frontend\IndexPage::class)->name('frontend.index');
Route::get('/home', \App\Livewire\Frontend\Index2::class)->name('frontend.home');
Route::get('/our-history', \App\Livewire\Frontend\OurHistory::class)->name('frontend.our-history');
Route::get('/our-team', \App\Livewire\Frontend\OurTeam::class)->name('frontend.our-team');
Route::get('/portfolio-detail-style-01', \App\Livewire\Frontend\PortfolioDetailStyle01::class)->name('frontend.portfolio-detail-style-01');
Route::get('/portfolio-detail-style-02', \App\Livewire\Frontend\PortfolioDetailStyle02::class)->name('frontend.portfolio-detail-style-02');
Route::get('/portfolio-grid-col-2', \App\Livewire\Frontend\PortfolioGridCol2::class)->name('frontend.portfolio-grid-col-2');
Route::get('/portfolio-grid-col-3', \App\Livewire\Frontend\PortfolioGridCol3::class)->name('frontend.portfolio-grid-col-3');
Route::get('/portfolio-grid-col-4', \App\Livewire\Frontend\PortfolioGridCol4::class)->name('frontend.portfolio-grid-col-4');
Route::get('/portfolio-grid-no-gap', \App\Livewire\Frontend\PortfolioGridNoGap::class)->name('frontend.portfolio-grid-no-gap');
Route::get('/portfolio-m-grid-col-2', \App\Livewire\Frontend\PortfolioMGridCol2::class)->name('frontend.portfolio-m-grid-col-2');
Route::get('/portfolio-m-grid-col-3', \App\Livewire\Frontend\PortfolioMGridCol3::class)->name('frontend.portfolio-m-grid-col-3');
Route::get('/portfolio-m-grid-col-4', \App\Livewire\Frontend\PortfolioMGridCol4::class)->name('frontend.portfolio-m-grid-col-4');
Route::get('/portfolio-m-grid-wide', \App\Livewire\Frontend\PortfolioMGridWide::class)->name('frontend.portfolio-m-grid-wide');
Route::get('/portfolio-sortable-grid-col-2', \App\Livewire\Frontend\PortfolioSortableGridCol2::class)->name('frontend.portfolio-sortable-grid-col-2');
Route::get('/portfolio-sortable-grid-col-3', \App\Livewire\Frontend\PortfolioSortableGridCol3::class)->name('frontend.portfolio-sortable-grid-col-3');
Route::get('/portfolio-sortable-grid-col-4', \App\Livewire\Frontend\PortfolioSortableGridCol4::class)->name('frontend.portfolio-sortable-grid-col-4');
Route::get('/product-details', \App\Livewire\Frontend\ServiceDetails::class)->name('frontend.service-details');
Route::get('/products', \App\Livewire\Frontend\Services::class)->name('frontend.services');
Route::get('/team-member-detail', \App\Livewire\Frontend\TeamMemberDetail::class)->name('frontend.team-member-detail');

// Standard Frontend Routes (Overriding Livewire where applicable)
Route::get('/', function () {
    $sliders = Slider::where('status', 'Active')->get();
    $videoSection = HomePage::where('section_type', 'our_clients')->first();
    $testimonials = Testimonial::where('status', 'Active')->get();
    $clients = Client::where('status', 'Active')->orderBy('id', 'asc')->get();
    $faqs = Faq::where('status', 'Active')->orderBy('sort_order', 'asc')->get();
    $faqSection = HomePage::where('section_type', 'faq_section')->first();
    $blogs = Blog::where('status', 'active')->orderBy('date', 'desc')->take(6)->get();
    return view('frontend.home', compact('sliders', 'videoSection', 'testimonials', 'clients', 'faqs', 'faqSection', 'blogs'));
})->name('home');

Route::get('/about-us', function () {
    $testimonials = Testimonial::where('status', 'Active')->get();
    $partners = TeamPartner::where('type', 'Partner')->where('status', 'Active')->get();
    $teamMembers = TeamPartner::where('type', 'Member')->where('status', 'Active')->get();
    $pageBannerImage = asset('frontend/images/bg/titlebar-bg.jpg');

    $aboutUs = HomePage::where('section_type', 'about_us')->first();
    $mission = AboutUs::find(1);
    $vision = AboutUs::find(2);
    $goal = AboutUs::find(3);

    return view('frontend.about-us', compact('testimonials', 'partners', 'teamMembers', 'pageBannerImage', 'aboutUs', 'mission', 'vision', 'goal'));
})->name('about-us');

Route::get('/company-profile', function () {
    $mainSection = HomePage::where('section_type', 'about_us')->first();
    $mission = AboutUs::find(1);
    $vision = AboutUs::find(2);
    $goal = AboutUs::find(3);
    $teamMembers = TeamPartner::where('type', 'Member')->where('status', 'Active')->get();
    $testimonials = Testimonial::where('status', 'Active')->get();
    return view('frontend.company-profile', compact('mainSection', 'mission', 'vision', 'goal', 'teamMembers', 'testimonials'));
})->name('company-profile');

Route::get('/our-clients', function () {
    $videoSection = HomePage::where('section_type', 'our_clients')->first();
    $clients = Client::where('status', 'Active')->orderBy('id', 'asc')->get();
    $pageBannerImage = asset('frontend/images/bg/titlebar-bg.jpg');
    return view('frontend.our-clients', compact('videoSection', 'clients', 'pageBannerImage'));
})->name('our-clients');

Route::get('/certificate', function () {
    return view('frontend.certificate');
})->name('certificate');

Route::get('/products', function () {
    $products = Product::where(function ($q) {
        $q->whereNull('parent_id')->orWhere('parent_id', 0);
    })->where('status', 'Active')->get();
    return view('frontend.services', compact('products'));
})->name('products');

Route::get('/products/{slug}/children', function ($slug) {
    $parent = Product::where('slug', $slug)->firstOrFail();
    $products = Product::where('parent_id', $parent->id)->where('status', 'Active')->get();
    return view('frontend.services', compact('products', 'parent'));
})->name('products.children');

Route::get('/product-details/{slug?}', function ($slug = null) {
    if ($slug) {
        $product = Product::where('slug', $slug)->firstOrFail();
    } else {
        $product = Product::where('status', 'Active')->first();
        if (!$product)
            abort(404, 'No products found.');
    }
    return view('frontend.product-details', compact('product'));
})->name('product-details');

// Backend View Routes (Temporary setup for design/preview)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::view('/', 'backend.dashboard')->name('dashboard');
    Route::view('dashboard', 'backend.dashboard')->name('dashboard');
    Route::view('login', 'backend.auth-login-basic')->name('login');
    Route::post('login', function() {
        return redirect()->route('admin.dashboard');
    })->name('login.post');
    Route::view('forgot-password', 'backend.auth-forgot-password-basic')->name('forgot-password');
    Route::view('reset-password', 'backend.auth-reset-password-basic')->name('reset-password');
    Route::view('change-password', 'backend.change-password')->name('change-password');
    Route::view('profile', 'backend.pages-profile-user')->name('profile');

    $dummyObj = new class {
        public function __get($name) { return ''; }
    };

    $defaults = [
        'type' => 'original',
        'totalOriginal' => 0,
        'totalCopies' => 0,
        'content' => $dummyObj,
        'settings' => $dummyObj,
        'products' => [],
        'blogs' => [],
        'careers' => [],
        'clients' => [],
        'contacts' => [],
        'dealers' => [],
        'inquiries' => [],
        'faqs' => [],
        'gallery' => [],
        'galleries' => [],
        'job_applications' => [],
        'applications' => [],
        'page_banners' => [],
        'roles' => [],
        'users' => []
    ];

    Route::get('blogs', function() use ($defaults) { return view('backend.blogs.index', $defaults); })->name('blogs.index');
    Route::get('careers', function() use ($defaults) { return view('backend.careers.index', $defaults); })->name('careers.index');
    Route::get('clients', function() use ($defaults) { return view('backend.clients.index', $defaults); })->name('clients.index');
    Route::get('contacts', function() use ($defaults) { return view('backend.contacts.index', $defaults); })->name('contacts.index');
    Route::get('dealers', function() use ($defaults) { return view('backend.dealers.index', $defaults); })->name('dealers.index');
    Route::get('faqs', function() use ($defaults) { return view('backend.faqs.index', $defaults); })->name('faqs.index');
    Route::get('gallery', function() use ($defaults) { return view('backend.gallery.index', $defaults); })->name('gallery.index');
    Route::get('job-applications', function() use ($defaults) { return view('backend.job-applications.index', $defaults); })->name('job-applications.index');
    Route::get('page-banners', function() use ($defaults) { return view('backend.page_banners.index', $defaults); })->name('page-banners.index');
    Route::get('products', function() use ($defaults) { return view('backend.products.index', $defaults); })->name('products.index');
    Route::get('roles', function() use ($defaults) { return view('backend.roles.index', $defaults); })->name('roles.index');
    Route::get('users', function() use ($defaults) { return view('backend.users.index', $defaults); })->name('users.index');

    // Website Pages
    Route::prefix('website-pages')->name('website-pages.')->group(function () use ($defaults) {
        Route::get('header-settings', function() use ($defaults) { return view('backend.website-pages.header-settings', $defaults); })->name('header-settings');
        Route::get('footer-settings', function() use ($defaults) { return view('backend.website-pages.footer-settings', $defaults); })->name('footer-settings');
        Route::get('default-image-settings', function() use ($defaults) { return view('backend.website-pages.default-image-settings', $defaults); })->name('default-image-settings');
        Route::get('general-settings', function() use ($defaults) { return view('backend.website-pages.general-settings', $defaults); })->name('general-settings');
        Route::get('sliders', function() use ($defaults) { return view('backend.website-pages.sliders.index', $defaults); })->name('sliders.index');
        Route::get('about-us', function() use ($defaults) { return view('backend.website-pages.about-us.index', $defaults); })->name('about-us.index');
        Route::get('video-section', function() use ($defaults) { return view('backend.website-pages.video-section.index', $defaults); })->name('video-section.index');
        Route::get('our-clients', function() use ($defaults) { return view('backend.website-pages.our-clients.index', $defaults); })->name('our-clients.index');
        Route::get('product-section', function() use ($defaults) { return view('backend.website-pages.product-section.index', $defaults); })->name('product-section.index');
        Route::get('page-banners', function() use ($defaults) { return view('backend.page_banners.index', $defaults); })->name('page-banners.index');
        Route::get('testimonials', function() use ($defaults) { return view('backend.website-pages.testimonials.index', $defaults); })->name('testimonials.index');
        Route::get('exhibitions', function() use ($defaults) { return view('backend.website-pages.exhibitions.index', $defaults); })->name('exhibitions.index');
        Route::get('team-partners', function() use ($defaults) { return view('backend.website-pages.team-partners.index', $defaults); })->name('team-partners.index');
        Route::get('brochure-page', function() use ($defaults) { return view('backend.website-pages.brochure-page', $defaults); })->name('brochure-page.index');
    });
});
