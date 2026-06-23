<?php

use Illuminate\Support\Facades\Route;

// Serve public-disk uploads when public/storage is a real directory instead
// of Laravel's symbolic link (common on local Windows/WAMP installations).
Route::get('uploaded-media/{path}', function (string $path) {
    $storageRoot = realpath(storage_path('app/public'));
    $file = realpath(storage_path('app/public/' . $path));

    abort_unless(
        $storageRoot && $file && str_starts_with($file, $storageRoot . DIRECTORY_SEPARATOR) && is_file($file),
        404
    );

    return response()->file($file);
})->where('path', '.*')->name('uploads.public');
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

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
use App\Models\Gallery;
use App\Models\User;

use App\Http\Controllers\Backend\CareerController;
use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\Backend\JobApplicationController;
use App\Http\Controllers\Backend\ExhibitionController;
use App\Http\Controllers\Backend\TeamPartnerController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Utility Routes
|--------------------------------------------------------------------------
*/

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

Route::get('/test-storage-link', function () {
    $storageDir = storage_path('app/public');
    $publicLink = public_path('storage');
    $output = [];

    // Check storage directory exists
    if (!file_exists($storageDir)) {
        @mkdir($storageDir, 0755, true);
        $output[] = "âœ“ Created storage/app/public directory";
    } else {
        $output[] = "âœ“ storage/app/public directory exists";
    }

    // Check if symlink already exists
    if (is_link($publicLink)) {
        @unlink($publicLink);
        $output[] = "âœ“ Removed existing symlink";
    }

    // Remove if it's a regular directory
    if (is_dir($publicLink) && !is_link($publicLink)) {
        $output[] = "âœ— Regular 'public/storage' directory exists (not a symlink). Remove it manually first.";
    }

    try {
        if (!is_link($publicLink)) {
            if (PHP_OS_FAMILY === 'Windows') {
                exec('mklink /D "' . $publicLink . '" "' . $storageDir . '"', $execOutput, $execReturn);
                if ($execReturn === 0) {
                    $output[] = "âœ“ Storage link created successfully (Windows)!";
                } else {
                    $output[] = "âœ— Failed to create symlink on Windows. Check permissions.";
                }
            } else {
                symlink($storageDir, $publicLink);
                $output[] = "âœ“ Storage link created successfully (Unix/Linux)!";
            }
        }

        if (is_link($publicLink)) {
            $target = readlink($publicLink);
            $output[] = "âœ“ Symlink verified! Points to: " . $target;
        }
    } catch (\Exception $e) {
        $output[] = "âœ— Error: " . $e->getMessage();
    }

    return implode("<br>", $output);
})->name('test-storage-link');

Route::get('/fix-storage-link', function () {
    $output = [];

    try {
        Artisan::call('storage:link');
        $output[] = "âœ“ Artisan storage:link executed";
    } catch (\Exception $e) {
        $output[] = "âœ— Artisan method failed: " . $e->getMessage();
    }

    $storageDir = storage_path('app/public');
    $publicLink = public_path('storage');

    if (!is_link($publicLink) && !is_dir($publicLink)) {
        try {
            if (!is_dir($storageDir)) {
                @mkdir($storageDir, 0755, true);
                @chmod($storageDir, 0755);
            }
            @symlink($storageDir, $publicLink);
            $output[] = "âœ“ Manual symlink created";
        } catch (\Exception $e) {
            $output[] = "âœ— Manual symlink failed: " . $e->getMessage();
        }
    }

    if (is_link($publicLink)) {
        $output[] = "âœ“ Storage link is active!";
    } else {
        $output[] = "âœ— Storage link still not working";
    }

    return implode("<br>", $output);
})->name('fix-storage-link');


/*
|--------------------------------------------------------------------------
| Livewire Frontend Routes
|--------------------------------------------------------------------------
| Note: Some of these routes might be overridden by Standard Frontend Routes below.
*/

Route::get('/about-us', [\App\Http\Controllers\Frontend\PageController::class, 'aboutUs'])->name('frontend.about-us');
Route::get('/career', [\App\Http\Controllers\Frontend\PageController::class, 'career'])->name('frontend.career');
Route::get('/exhibition', [\App\Http\Controllers\Frontend\PageController::class, 'exhibition'])->name('frontend.exhibition');
Route::get('/exhibition-details/{id}', [\App\Http\Controllers\Frontend\PageController::class, 'exhibitionDetails'])->name('frontend.exhibition-details');
Route::get('/certificates', [\App\Http\Controllers\Frontend\PageController::class, 'certificates'])->name('frontend.certificates');
Route::get('/gallery', [\App\Http\Controllers\Frontend\PageController::class, 'gallery'])->name('frontend.gallery');
Route::get('/blogs', [\App\Http\Controllers\Frontend\PageController::class, 'blogs'])->name('frontend.blog-grid-col-3');
Route::get('/blog/{slug}', [\App\Http\Controllers\Frontend\PageController::class, 'blogDetail'])->name('frontend.blog-single-details');
Route::get('/contact-us', [\App\Http\Controllers\Frontend\PageController::class, 'contactUs'])->name('frontend.contact-us');
Route::get('/home', [\App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('frontend.home');
Route::get('/index-2', [\App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('frontend.index-2');
Route::get('/our-history', [\App\Http\Controllers\Frontend\PageController::class, 'ourHistory'])->name('frontend.our-history');


/*
|--------------------------------------------------------------------------
| Standard Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [\App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('frontend.index');

// about-us is now handled by frontend.about-us route above (PageController)

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

Route::get('/our-product/{slug?}', function ($slug = null) {
    if ($slug) {
        $product = Product::where('slug', $slug)->firstOrFail();
    } else {
        $product = Product::where('status', 'Active')->first();
        if (!$product) {
            abort(404, 'No products found.');
        }
    }

    // If the product is a category (parent), show its children
    if ($product->is_parent || Product::where('parent_id', $product->id)->exists()) {
        $parent = $product;
        $products = Product::where('parent_id', $parent->id)->where('status', 'Active')->get();
        return view('frontend.services', compact('products', 'parent'));
    }

    // Otherwise, show the single product details
    return view('frontend.product-details', compact('product'));
})->name('product-details');

// Keep the name alias for backward compatibility in blade files if any missed
Route::get('/our-product/{slug}/category', function ($slug) {
    return redirect()->route('product-details', ['slug' => $slug]);
})->name('products.children');


/*
|--------------------------------------------------------------------------
| Backend View Routes (Admin Panel)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    
    // ==========================================
    // Auth & Dashboard
    // ==========================================
    Route::get('/', [\App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard');
    Route::get('dashboard', [\App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard.alt');
    
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
    
    // ==========================================
    // Default Data for Views
    // ==========================================
    $dummyObj = new class {
        public function __get($name) { return null; }
    };

    $defaults = [
        'type' => 'original',
        'totalOriginal' => 0,
        'totalCopies' => 0,
        'content' => $dummyObj,
        'settings' => class_exists('App\Models\GeneralSetting') ? (GeneralSetting::first() ?: $dummyObj) : $dummyObj,
        'footer_settings' => class_exists('App\Models\FooterSetting') ? (App\Models\FooterSetting::first() ?: $dummyObj) : $dummyObj,
        'mainSection' => $dummyObj,
        'mission' => $dummyObj,
        'vision' => $dummyObj,
        'goal' => $dummyObj,
        'homePage' => $dummyObj,
        'homePageAbout' => $dummyObj,
        'user' => class_exists('App\Models\User') ? User::first() : $dummyObj,
        'products' => class_exists('App\Models\Product') ? Product::orderBy('id', 'desc')->get() : [],
        'blogs' => class_exists('App\Models\Blog') ? Blog::orderBy('id', 'desc')->get() : [],
        'careers' => [],
        'clients' => class_exists('App\Models\Client') ? Client::orderBy('id', 'desc')->get() : [],
        'contacts' => [],
        'dealers' => [],
        'inquiries' => [],
        'faqs' => class_exists('App\Models\Faq') ? Faq::orderBy('id', 'desc')->get() : [],
        'gallery' => [],
        'galleries' => [],
        'job_applications' => [],
        'applications' => [],
        'page_banners' => [],
        'banners' => [],
        'testimonials' => class_exists('App\Models\Testimonial') ? Testimonial::orderBy('id', 'desc')->get() : [],
        'items' => class_exists('App\Models\TeamPartner') ? TeamPartner::orderBy('id', 'desc')->get() : [],
        'sliders' => class_exists('App\Models\Slider') ? Slider::orderBy('id', 'desc')->get() : [],
        'industries' => [],
        'defaultQuickLinks' => [],
        'exhibitions' => [],
        'defaultSpecs' => [],
        'parent_products' => class_exists('App\Models\Product') ? Product::orderBy('id', 'desc')->get() : [],
        'roles' => [],
        'users' => class_exists('App\Models\User') ? User::orderBy('id', 'desc')->get() : []
    ];

    // ==========================================
    // Profile Management
    // ==========================================
    Route::get('profile', function () use ($defaults) {
        return view('backend.pages-profile-user', $defaults);
    })->name('profile');
    
    Route::post('profile', function (Request $request) {
        $user = User::first();
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
    
    Route::post('profile/password', function (Request $request) {
        $user = User::first();
        if ($user && $request->filled('password')) {
            $user->update(['password' => bcrypt($request->password)]);
        }
        return redirect()->route('admin.profile', ['tab' => 'password'])->with('success', 'Password changed successfully!');
    })->name('profile.password');

    // ==========================================
    // Blogs Management
    // ==========================================
    Route::get('blogs', function () use ($defaults) {
        return view('backend.blogs.index', $defaults);
    })->name('blogs.index');
    
    Route::get('blogs/create', function () use ($defaults) {
        return view('backend.blogs.create', $defaults);
    })->name('blogs.create');
    
    Route::get('blogs/{id}/edit', function ($id) use ($defaults) {
        $defaults['blog'] = class_exists('App\Models\Blog') ? Blog::find($id) : null;
        return view('backend.blogs.edit', $defaults);
    })->name('blogs.edit');
    
    Route::put('blogs/{id}', function (Request $request, $id) {
        if (class_exists('App\Models\Blog')) {
            $blog = Blog::find($id);
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

    // ==========================================
    // Gallery Management
    // ==========================================
    Route::get('gallery', function () use ($defaults) {
        $defaults['galleries'] = Gallery::all();
        return view('backend.gallery.index', $defaults);
    })->name('gallery.index');
    
    Route::post('gallery', function (Request $request) {
        Gallery::create([
            'tab_name' => $request->tab_name,
            'status' => $request->status ?? 'inactive',
            'images' => []
        ]);
        return back()->with('success', 'Gallery tab created successfully!');
    })->name('gallery.store');
    
    Route::put('gallery/{id?}', function (Request $request, $id) {
        Gallery::findOrFail($id)->update([
            'tab_name' => $request->tab_name,
            'status' => $request->status ?? 'inactive'
        ]);
        return back()->with('success', 'Gallery tab updated successfully!');
    })->name('gallery.update');
    
    Route::delete('gallery/{id?}', function ($id) {
        Gallery::findOrFail($id)->delete();
        return back()->with('success', 'Gallery tab deleted successfully!');
    })->name('gallery.destroy');
    
    Route::get('gallery/{id}', function ($id) use ($defaults) {
        $defaults['gallery'] = Gallery::findOrFail($id);
        return view('backend.gallery.show', $defaults);
    })->name('gallery.show');
    
    Route::post('gallery/{id}/upload', function (Request $request, $id) {
        $gallery = Gallery::findOrFail($id);
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
    
    Route::post('gallery/{id}/delete-image', function (Request $request, $id) {
        $gallery = Gallery::findOrFail($id);
        $images = $gallery->images ?? [];
        $pathToRemove = $request->image_path;
        $images = array_values(array_filter($images, function ($img) use ($pathToRemove) {
            return $img !== $pathToRemove;
        }));
        $gallery->update(['images' => $images]);
        Storage::disk('public')->delete($pathToRemove);
        return back()->with('success', 'Image deleted successfully!');
    })->name('gallery.delete_image');

    // ==========================================
    // Other Resources & Simple Views
    // ==========================================
    Route::resource('careers', CareerController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('job-applications', JobApplicationController::class)->only(['index', 'show', 'destroy']);
    
    Route::get('contacts', function () use ($defaults) { return view('backend.contacts.index', $defaults); })->name('contacts.index');
    Route::get('dealers', function () use ($defaults) { return view('backend.dealers.index', $defaults); })->name('dealers.index');
    Route::post('faqs/update-section', [\App\Http\Controllers\Backend\FaqController::class, 'updateSection'])->name('faqs.update-section');
    Route::resource('faqs', \App\Http\Controllers\Backend\FaqController::class);
    // Route::get('page-banners', function () use ($defaults) { return view('backend.page_banners.index', $defaults); })->name('page-banners.index');
    Route::get('roles', function () use ($defaults) { return view('backend.roles.index', $defaults); })->name('roles.index');
    Route::resource('users', \App\Http\Controllers\Backend\UserController::class);

    Route::resource('products', ProductController::class);
    Route::post('products/{product}/copy', [ProductController::class, 'copy'])->name('products.copy');

    // ==========================================
    // Website Pages Settings
    // ==========================================
    Route::prefix('website-pages')->name('website-pages.')->group(function () use ($defaults) {
        Route::get('header-settings', function () use ($defaults) { return view('backend.website-pages.header-settings', $defaults); })->name('header-settings');
        
        Route::get('footer-settings', function () use ($defaults) { 
            // Use FooterSetting for this view
            $defaults['settings'] = class_exists('App\Models\FooterSetting') ? (\App\Models\FooterSetting::first() ?: clone $defaults['settings']) : clone $defaults['settings'];
            return view('backend.website-pages.footer-settings', $defaults); 
        })->name('footer-settings');
        Route::post('footer-settings', function (Illuminate\Http\Request $request) {
            $settings = \App\Models\FooterSetting::first();
            if (!$settings) {
                $settings = new \App\Models\FooterSetting();
            }
            $data = $request->except(['_token', '_method']);
            
            // Transform quick_links
            if (isset($data['quick_links']) && is_array($data['quick_links'])) {
                $formattedQuickLinks = [];
                if (isset($data['quick_links']['title']) && is_array($data['quick_links']['title'])) {
                    foreach ($data['quick_links']['title'] as $key => $title) {
                        if (!empty($title)) {
                            $formattedQuickLinks[] = [
                                'title' => $title,
                                'url' => $data['quick_links']['url'][$key] ?? '#'
                            ];
                        }
                    }
                }
                $data['quick_links'] = json_encode($formattedQuickLinks);
            }
            
            // Transform other_links
            if (isset($data['other_links']) && is_array($data['other_links'])) {
                $formattedOtherLinks = [];
                if (isset($data['other_links']['title']) && is_array($data['other_links']['title'])) {
                    foreach ($data['other_links']['title'] as $key => $title) {
                        if (!empty($title)) {
                            $formattedOtherLinks[] = [
                                'title' => $title,
                                'url' => $data['other_links']['url'][$key] ?? '#'
                            ];
                        }
                    }
                }
                $data['other_links'] = json_encode($formattedOtherLinks);
            }

            $settings->fill($data);
            $settings->save();
            return redirect()->route('admin.website-pages.footer-settings')->with('success', 'Footer Settings updated successfully!');
        })->name('footer-settings.post');

        Route::get('default-image-settings', function () use ($defaults) { return view('backend.website-pages.default-image-settings', $defaults); })->name('default-image-settings');
        
        Route::get('general-settings', function () use ($defaults) { return view('backend.website-pages.general-settings', $defaults); })->name('general-settings');
        Route::post('general-settings', function (Request $request) {
            $settings = GeneralSetting::first();
            if (!$settings) {
                $settings = new GeneralSetting();
            }
            $settings->fill($request->except(['_token', '_method']));
            $settings->save();
            return redirect()->route('admin.website-pages.general-settings')->with('success', 'General Settings updated successfully!');
        });
        
        Route::resource('sliders', \App\Http\Controllers\Backend\SliderController::class)->except('show');
        
        Route::get('about-us', function () use ($defaults) {
            $defaults['mainSection'] = HomePage::firstOrCreate(['section_type' => 'about_us'], ['title' => '']);
            $defaults['mission'] = AboutUs::firstOrCreate(['id' => 1], ['sub_content_title' => 'Mission']);
            $defaults['vision'] = AboutUs::firstOrCreate(['id' => 2], ['sub_content_title' => 'Vision']);
            $defaults['goal'] = AboutUs::firstOrCreate(['id' => 3], ['sub_content_title' => 'Goal']);
            $defaults['missionCheckpoints'] = json_decode($defaults['mission']->checkpoints ?? '[]');
            $defaults['visionCheckpoints'] = json_decode($defaults['vision']->checkpoints ?? '[]');
            $defaults['goalCheckpoints'] = json_decode($defaults['goal']->checkpoints ?? '[]');
            return view('backend.website-pages.about-us.index', $defaults);
        })->name('about-us.index');

        Route::post('about-us', function (Request $request) {
            $mainSection = HomePage::firstOrCreate(['section_type' => 'about_us']);
            $mainData = $request->except(['_token', '_method', 'mission_title', 'mission_description', 'mission_checkpoints', 'vision_title', 'vision_description', 'vision_checkpoints', 'goal_title', 'goal_description', 'goal_checkpoints', 'photo', 'sub_title']);
            $mainData['subtitle'] = $request->sub_title;

            if ($request->hasFile('photo')) {
                $mainData['photo'] = $request->file('photo')->store('about_us', 'public');
            }
            $mainSection->update($mainData);

            $missionCheckpoints = array_map(function ($title) { return ['title' => $title]; }, array_filter($request->mission_checkpoints ?? []));
            AboutUs::updateOrCreate(['id' => 1], [
                'sub_content_title' => $request->mission_title,
                'sub_content_description' => $request->mission_description,
                'checkpoints' => json_encode($missionCheckpoints)
            ]);

            $visionCheckpoints = array_map(function ($title) { return ['title' => $title]; }, array_filter($request->vision_checkpoints ?? []));
            AboutUs::updateOrCreate(['id' => 2], [
                'sub_content_title' => $request->vision_title,
                'sub_content_description' => $request->vision_description,
                'checkpoints' => json_encode($visionCheckpoints)
            ]);

            $goalCheckpoints = array_map(function ($title) { return ['title' => $title]; }, array_filter($request->goal_checkpoints ?? []));
            AboutUs::updateOrCreate(['id' => 3], [
                'sub_content_title' => $request->goal_title,
                'sub_content_description' => $request->goal_description,
                'checkpoints' => json_encode($goalCheckpoints)
            ]);

            return redirect()->route('admin.website-pages.about-us.index')->with('success', 'About Us updated successfully!');
        });
        
        Route::get('video-section', function () use ($defaults) { return view('backend.website-pages.video-section.index', $defaults); })->name('video-section.index');
        Route::get('our-clients', function () use ($defaults) { return view('backend.website-pages.our-clients.index', $defaults); })->name('our-clients.index');
        Route::get('product-section', function () use ($defaults) { return view('backend.website-pages.product-section.index', $defaults); })->name('product-section.index');
        Route::get('page-banners', [\App\Http\Controllers\PageBannerController::class, 'index'])->name('page-banners.index');
        Route::post('page-banners', [\App\Http\Controllers\PageBannerController::class, 'update'])->name('page-banners.update');
        Route::resource('testimonials', \App\Http\Controllers\Backend\TestimonialController::class)->except('show');
        Route::resource('exhibitions', ExhibitionController::class);
        Route::resource('team-partners', TeamPartnerController::class);
        Route::get('brochure-page', function () use ($defaults) { return view('backend.website-pages.brochure-page', $defaults); })->name('brochure-page.index');
    });
});
