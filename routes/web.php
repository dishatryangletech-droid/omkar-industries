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
use App\Models\GeneralSetting;

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
    return "Cache is cleared successfully!";
});

Route::get('/storage-link', function () {
    Artisan::call('storage:link');

    return 'Storage linked successfully';
});

/*
|--------------------------------------------------------------------------
| Test Route for Storage Link
|--------------------------------------------------------------------------
*/
Route::get('/test-storage-link', function () {
    $storageDir = storage_path('app/public');
    $publicLink = public_path('storage');

    $output = [];

    // Check storage directory exists
    if (!file_exists($storageDir)) {
        @mkdir($storageDir, 0755, true);
        $output[] = "✓ Created storage/app/public directory";
    } else {
        $output[] = "✓ storage/app/public directory exists";
    }

    // Check if symlink already exists
    if (is_link($publicLink)) {
        // Remove broken symlink
        @unlink($publicLink);
        $output[] = "✓ Removed existing symlink";
    }

    // Remove if it's a regular directory
    if (is_dir($publicLink) && !is_link($publicLink)) {
        $output[] = "✗ Regular 'public/storage' directory exists (not a symlink). Remove it manually first.";
    }

    try {
        // Try creating symlink
        if (!is_link($publicLink)) {
            if (PHP_OS_FAMILY === 'Windows') {
                // Windows requires absolute paths or symlink('relative/path')
                exec('mklink /D "' . $publicLink . '" "' . $storageDir . '"', $execOutput, $execReturn);
                if ($execReturn === 0) {
                    $output[] = "✓ Storage link created successfully (Windows)!";
                } else {
                    $output[] = "✗ Failed to create symlink on Windows. Check permissions.";
                }
            } else {
                // Unix/Linux
                symlink($storageDir, $publicLink);
                $output[] = "✓ Storage link created successfully (Unix/Linux)!";
            }
        }

        // Verify symlink
        if (is_link($publicLink)) {
            $target = readlink($publicLink);
            $output[] = "✓ Symlink verified! Points to: " . $target;
        }

    } catch (\Exception $e) {
        $output[] = "✗ Error: " . $e->getMessage();
    }

    return implode("<br>", $output);
})->name('test-storage-link');

/*
|--------------------------------------------------------------------------
| Fix Storage Link (Alternative Method for Server)
|--------------------------------------------------------------------------
*/
Route::get('/fix-storage-link', function () {
    $output = [];

    try {
        // Method 1: Try Artisan command
        Artisan::call('storage:link');
        $output[] = "✓ Artisan storage:link executed";
    } catch (\Exception $e) {
        $output[] = "✗ Artisan method failed: " . $e->getMessage();
    }

    // Verify or create manually
    $storageDir = storage_path('app/public');
    $publicLink = public_path('storage');

    if (!is_link($publicLink) && !is_dir($publicLink)) {
        try {
            // Create storage directory if missing
            if (!is_dir($storageDir)) {
                @mkdir($storageDir, 0755, true);
                @chmod($storageDir, 0755);
            }

            // Try Unix symlink
            @symlink($storageDir, $publicLink);
            $output[] = "✓ Manual symlink created";
        } catch (\Exception $e) {
            $output[] = "✗ Manual symlink failed: " . $e->getMessage();
        }
    }

    if (is_link($publicLink)) {
        $output[] = "✓ Storage link is active!";
    } else {
        $output[] = "✗ Storage link still not working";
    }

    return implode("<br>", $output);
})->name('fix-storage-link');

// Livewire Frontend Routes
Route::get('/about-us', \App\Livewire\Frontend\AboutUs::class)->name('frontend.about-us');
Route::get('/career', \App\Livewire\Frontend\Career::class)->name('frontend.career');
Route::get('/exhibition', \App\Livewire\Frontend\Exhibition::class)->name('frontend.exhibition');
Route::get('/exhibition-details/{id}', \App\Livewire\Frontend\ExhibitionDetails::class)->name('frontend.exhibition-details');
Route::get('/certificates', \App\Livewire\Frontend\Certificates::class)->name('frontend.certificates');
Route::get('/gallery', \App\Livewire\Frontend\Gallery::class)->name('frontend.gallery');
Route::get('/blog-classic', \App\Livewire\Frontend\BlogClassic::class)->name('frontend.blog-classic');
Route::get('/blogs', \App\Livewire\Frontend\BlogGridCol3::class)->name('frontend.blog-grid-col-3');
Route::get('/blog-grid-col-4', \App\Livewire\Frontend\BlogGridCol4::class)->name('frontend.blog-grid-col-4');
Route::get('/blog-m-grid-col-2', \App\Livewire\Frontend\BlogMGridCol2::class)->name('frontend.blog-m-grid-col-2');
Route::get('/blog-m-grid-col-3', \App\Livewire\Frontend\BlogMGridCol3::class)->name('frontend.blog-m-grid-col-3');
Route::get('/blog-m-grid-col-4', \App\Livewire\Frontend\BlogMGridCol4::class)->name('frontend.blog-m-grid-col-4');
Route::get('/blog-masonry-wide', \App\Livewire\Frontend\BlogMasonryWide::class)->name('frontend.blog-masonry-wide');
Route::get('/blog-detail/{id}', \App\Livewire\Frontend\BlogSingleDetails::class)->name('frontend.blog-single-details');
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
    $partners = \Illuminate\Support\Facades\File::exists(public_path('frontend/images/partner_logos')) ? \Illuminate\Support\Facades\File::files(public_path('frontend/images/partner_logos')) : [];
    return view('frontend.home', compact('sliders', 'videoSection', 'testimonials', 'clients', 'faqs', 'faqSection', 'blogs', 'partners'));
})->name('frontend.index');

Route::get('/about-us', function () {
    $testimonials = Testimonial::where('status', 'Active')->get();
    $partners = \Illuminate\Support\Facades\File::exists(public_path('frontend/images/partner_logos')) ? \Illuminate\Support\Facades\File::files(public_path('frontend/images/partner_logos')) : [];
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
    Route::post('login', function () {
        return redirect()->route('admin.dashboard');
    })->name('login.post');
    Route::get('logout', function () {
        if (auth()->check()) {
            auth()->logout();
        }
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('admin.login');
    })->name('logout');
    Route::view('forgot-password', 'backend.auth-forgot-password-basic')->name('forgot-password');
    Route::view('reset-password', 'backend.auth-reset-password-basic')->name('reset-password');
    Route::view('change-password', 'backend.change-password')->name('change-password');
    Route::view('profile', 'backend.pages-profile-user')->name('profile');

    $dummyObj = new class {
        public function __get($name)
        {
            return null;
        }
    };

    $defaults = [
        'type' => 'original',
        'totalOriginal' => 0,
        'totalCopies' => 0,
        'content' => $dummyObj,
        'settings' => class_exists('App\Models\GeneralSetting') ? (\App\Models\GeneralSetting::first() ?: $dummyObj) : $dummyObj,
        'mainSection' => $dummyObj,
        'mission' => $dummyObj,
        'vision' => $dummyObj,
        'goal' => $dummyObj,
        'homePage' => $dummyObj,
        'homePageAbout' => $dummyObj,
        'user' => class_exists('App\Models\User') ? \App\Models\User::first() : $dummyObj,
        'products' => class_exists('App\Models\Product') ? \App\Models\Product::orderBy('id', 'desc')->get() : [],
        'blogs' => class_exists('App\Models\Blog') ? \App\Models\Blog::orderBy('id', 'desc')->get() : [],
        'careers' => [],
        'clients' => class_exists('App\Models\Client') ? \App\Models\Client::orderBy('id', 'desc')->get() : [],
        'contacts' => [],
        'dealers' => [],
        'inquiries' => [],
        'faqs' => class_exists('App\Models\Faq') ? \App\Models\Faq::orderBy('id', 'desc')->get() : [],
        'gallery' => [],
        'galleries' => [],
        'job_applications' => [],
        'applications' => [],
        'page_banners' => [],
        'banners' => [],
        'testimonials' => class_exists('App\Models\Testimonial') ? \App\Models\Testimonial::orderBy('id', 'desc')->get() : [],
        'items' => class_exists('App\Models\TeamPartner') ? \App\Models\TeamPartner::orderBy('id', 'desc')->get() : [],
        'sliders' => class_exists('App\Models\Slider') ? \App\Models\Slider::orderBy('id', 'desc')->get() : [],
        'industries' => [],
        'defaultQuickLinks' => [],
        'exhibitions' => [],
        'defaultSpecs' => [],
        'parent_products' => class_exists('App\Models\Product') ? \App\Models\Product::orderBy('id', 'desc')->get() : [],
        'roles' => [],
        'users' => class_exists('App\Models\User') ? \App\Models\User::orderBy('id', 'desc')->get() : []
    ];

    Route::get('blogs', function () use ($defaults) {
        return view('backend.blogs.index', $defaults);
    })->name('blogs.index');
    Route::get('blogs/create', function () use ($defaults) {
        return view('backend.blogs.create', $defaults);
    })->name('blogs.create');
    Route::get('blogs/{id}/edit', function ($id) use ($defaults) {
        $defaults['blog'] = class_exists('App\Models\Blog') ? \App\Models\Blog::find($id) : null;
        return view('backend.blogs.edit', $defaults);
    })->name('blogs.edit');
    Route::put('blogs/{id}', function (Illuminate\Http\Request $request, $id) {
        if (class_exists('App\Models\Blog')) {
            $blog = \App\Models\Blog::find($id);
            if ($blog) {
                $data = $request->except(['_token', '_method', 'image']);
                if ($request->hasFile('image')) {
                    $path = $request->file('image')->store('blogs', 'public');
                    $data['image'] = $path;
                }
                $blog->update($data);
            }
        }
        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully!');
    })->name('blogs.update');
    Route::resource('careers', \App\Http\Controllers\Backend\CareerController::class);
    Route::resource('clients', \App\Http\Controllers\Backend\ClientController::class);
    Route::get('contacts', function () use ($defaults) {
        return view('backend.contacts.index', $defaults);
    })->name('contacts.index');
    Route::get('dealers', function () use ($defaults) {
        return view('backend.dealers.index', $defaults);
    })->name('dealers.index');
    Route::get('faqs', function () use ($defaults) {
        return view('backend.faqs.index', $defaults);
    })->name('faqs.index');
    Route::get('gallery', function () use ($defaults) {
        $defaults['galleries'] = \App\Models\Gallery::all();
        return view('backend.gallery.index', $defaults);
    })->name('gallery.index');
    Route::post('gallery', function (Illuminate\Http\Request $request) {
        \App\Models\Gallery::create([
            'tab_name' => $request->tab_name,
            'status' => $request->status ?? 'inactive',
            'images' => []
        ]);
        return back()->with('success', 'Gallery tab created successfully!');
    })->name('gallery.store');
    Route::put('gallery/{id?}', function (Illuminate\Http\Request $request, $id) {
        \App\Models\Gallery::findOrFail($id)->update([
            'tab_name' => $request->tab_name,
            'status' => $request->status ?? 'inactive'
        ]);
        return back()->with('success', 'Gallery tab updated successfully!');
    })->name('gallery.update');
    Route::delete('gallery/{id?}', function ($id) {
        \App\Models\Gallery::findOrFail($id)->delete();
        return back()->with('success', 'Gallery tab deleted successfully!');
    })->name('gallery.destroy');
    Route::get('gallery/{id}', function ($id) use ($defaults) {
        $defaults['gallery'] = \App\Models\Gallery::findOrFail($id);
        return view('backend.gallery.show', $defaults);
    })->name('gallery.show');
    Route::post('gallery/{id}/upload', function (Illuminate\Http\Request $request, $id) {
        $gallery = \App\Models\Gallery::findOrFail($id);
        $images = $gallery->images ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('gallery', 'public');
                $images[] = $path;
            }
            $gallery->update(['images' => $images]);
        }
        return back()->with('success', 'Images uploaded successfully!');
    })->name('gallery.upload');
    Route::post('gallery/{id}/delete-image', function (Illuminate\Http\Request $request, $id) {
        $gallery = \App\Models\Gallery::findOrFail($id);
        $images = $gallery->images ?? [];
        $pathToRemove = $request->image_path;
        $images = array_values(array_filter($images, function ($img) use ($pathToRemove) {
            return $img !== $pathToRemove;
        }));
        $gallery->update(['images' => $images]);
        // Also delete from storage
        \Illuminate\Support\Facades\Storage::disk('public')->delete($pathToRemove);
        return back()->with('success', 'Image deleted successfully!');
    })->name('gallery.delete_image');
    Route::resource('job-applications', \App\Http\Controllers\Backend\JobApplicationController::class)->only(['index', 'show', 'destroy']);
    Route::get('page-banners', function () use ($defaults) {
        return view('backend.page_banners.index', $defaults);
    })->name('page-banners.index');

    Route::resource('products', \App\Http\Controllers\ProductController::class);
    Route::post('products/{product}/copy', [\App\Http\Controllers\ProductController::class, 'copy'])->name('products.copy');

    Route::get('roles', function () use ($defaults) {
        return view('backend.roles.index', $defaults);
    })->name('roles.index');
    Route::get('users', function () use ($defaults) {
        return view('backend.users.index', $defaults);
    })->name('users.index');
    Route::get('profile', function () use ($defaults) {
        return view('backend.pages-profile-user', $defaults);
    })->name('profile');
    Route::post('profile', function (Illuminate\Http\Request $request) {
        $user = \App\Models\User::first();
        if ($user) {
            $data = $request->only(['name', 'email']);
            if ($request->hasFile('profile_image')) {
                $file = $request->file('profile_image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/profile_images'), $filename);
                $data['profile_image'] = 'uploads/profile_images/' . $filename;
            }
            $user->update($data);
        }
        return redirect()->route('admin.profile', ['tab' => 'profile'])->with('success', 'Profile updated successfully!');
    })->name('profile.update');
    Route::post('profile/password', function (Illuminate\Http\Request $request) {
        $user = \App\Models\User::first();
        if ($user && $request->filled('password')) {
            $user->update(['password' => bcrypt($request->password)]);
        }
        return redirect()->route('admin.profile', ['tab' => 'password'])->with('success', 'Password changed successfully!');
    })->name('profile.password');
    Route::get('change-password', function () use ($defaults) {
        return view('backend.change-password', $defaults);
    })->name('change-password');

    // Website Pages
    Route::prefix('website-pages')->name('website-pages.')->group(function () use ($defaults) {
        Route::get('header-settings', function () use ($defaults) {
            return view('backend.website-pages.header-settings', $defaults);
        })->name('header-settings');
        Route::get('footer-settings', function () use ($defaults) {
            return view('backend.website-pages.footer-settings', $defaults);
        })->name('footer-settings');
        Route::get('default-image-settings', function () use ($defaults) {
            return view('backend.website-pages.default-image-settings', $defaults);
        })->name('default-image-settings');
        Route::get('general-settings', function () use ($defaults) {
            return view('backend.website-pages.general-settings', $defaults);
        })->name('general-settings');
        Route::post('general-settings', function (\Illuminate\Http\Request $request) {
            $settings = \App\Models\GeneralSetting::first();
            if (!$settings) {
                $settings = new \App\Models\GeneralSetting();
            }
            $settings->fill($request->except(['_token', '_method']));
            $settings->save();
            return redirect()->route('admin.website-pages.general-settings')->with('success', 'General Settings updated successfully!');
        });
        Route::get('sliders', function () use ($defaults) {
            return view('backend.website-pages.sliders.index', $defaults);
        })->name('sliders.index');
        Route::get('about-us', function () use ($defaults) {
            $defaults['mainSection'] = \App\Models\HomePage::firstOrCreate(['section_type' => 'about_us'], ['title' => '']);
            $defaults['mission'] = \App\Models\AboutUs::firstOrCreate(['id' => 1], ['sub_content_title' => 'Mission']);
            $defaults['vision'] = \App\Models\AboutUs::firstOrCreate(['id' => 2], ['sub_content_title' => 'Vision']);
            $defaults['goal'] = \App\Models\AboutUs::firstOrCreate(['id' => 3], ['sub_content_title' => 'Goal']);
            $defaults['missionCheckpoints'] = json_decode($defaults['mission']->checkpoints ?? '[]');
            $defaults['visionCheckpoints'] = json_decode($defaults['vision']->checkpoints ?? '[]');
            $defaults['goalCheckpoints'] = json_decode($defaults['goal']->checkpoints ?? '[]');
            return view('backend.website-pages.about-us.index', $defaults);
        })->name('about-us.index');

        Route::post('about-us', function (\Illuminate\Http\Request $request) {
            $mainSection = \App\Models\HomePage::firstOrCreate(['section_type' => 'about_us']);
            $mainData = $request->except(['_token', '_method', 'mission_title', 'mission_description', 'mission_checkpoints', 'vision_title', 'vision_description', 'vision_checkpoints', 'goal_title', 'goal_description', 'goal_checkpoints', 'photo', 'sub_title']);
            $mainData['subtitle'] = $request->sub_title;

            if ($request->hasFile('photo')) {
                $mainData['photo'] = $request->file('photo')->store('about_us', 'public');
            }
            $mainSection->update($mainData);

            // Update Mission
            $missionCheckpoints = array_map(function ($title) {
                return ['title' => $title];
            }, array_filter($request->mission_checkpoints ?? []));
            \App\Models\AboutUs::updateOrCreate(['id' => 1], [
                'sub_content_title' => $request->mission_title,
                'sub_content_description' => $request->mission_description,
                'checkpoints' => json_encode($missionCheckpoints)
            ]);

            // Update Vision
            $visionCheckpoints = array_map(function ($title) {
                return ['title' => $title];
            }, array_filter($request->vision_checkpoints ?? []));
            \App\Models\AboutUs::updateOrCreate(['id' => 2], [
                'sub_content_title' => $request->vision_title,
                'sub_content_description' => $request->vision_description,
                'checkpoints' => json_encode($visionCheckpoints)
            ]);

            // Update Goal
            $goalCheckpoints = array_map(function ($title) {
                return ['title' => $title];
            }, array_filter($request->goal_checkpoints ?? []));
            \App\Models\AboutUs::updateOrCreate(['id' => 3], [
                'sub_content_title' => $request->goal_title,
                'sub_content_description' => $request->goal_description,
                'checkpoints' => json_encode($goalCheckpoints)
            ]);

            return redirect()->route('admin.website-pages.about-us.index')->with('success', 'About Us updated successfully!');
        });
        Route::get('video-section', function () use ($defaults) {
            return view('backend.website-pages.video-section.index', $defaults);
        })->name('video-section.index');
        Route::get('our-clients', function () use ($defaults) {
            return view('backend.website-pages.our-clients.index', $defaults);
        })->name('our-clients.index');
        Route::get('product-section', function () use ($defaults) {
            return view('backend.website-pages.product-section.index', $defaults);
        })->name('product-section.index');
        Route::get('page-banners', function () use ($defaults) {
            return view('backend.page_banners.index', $defaults);
        })->name('page-banners.index');
        Route::get('testimonials', function () use ($defaults) {
            return view('backend.website-pages.testimonials.index', $defaults);
        })->name('testimonials.index');
        Route::resource('exhibitions', \App\Http\Controllers\Backend\ExhibitionController::class);
        Route::resource('team-partners', \App\Http\Controllers\Backend\TeamPartnerController::class);
        Route::get('brochure-page', function () use ($defaults) {
            return view('backend.website-pages.brochure-page', $defaults);
        })->name('brochure-page.index');
    });
});
