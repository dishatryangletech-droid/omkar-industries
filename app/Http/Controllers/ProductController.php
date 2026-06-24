<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductSection;
use App\Models\Industry;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
        
        $type = $request->get('type', 'original');
        
        if ($type === 'copy') {
            $query->whereNotNull('original_product_id');
        } else {
            $query->whereNull('original_product_id');
        }
        
        $products = $query->latest()->get();
        $totalOriginal = Product::whereNull('original_product_id')->count();
        $totalCopies = Product::whereNotNull('original_product_id')->count();

        return view('backend.products.index', compact('products', 'totalOriginal', 'totalCopies', 'type'));
    }

    public function create()
    {
        $all_industries = Industry::where('status', 'Active')->get();
        $all_applications = Application::where('status', 'Active')->get();
        $all_products = Product::where('status', 'Active')->get();
        $parent_products = Product::where('is_parent', true)->get();
        return view('backend.products.create', compact('all_industries', 'all_applications', 'all_products', 'parent_products'));
    }

    public function store(Request $request)
    {
        $request->merge([
            'slug' => $request->slug ?: \Illuminate\Support\Str::slug($request->title)
        ]);

        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        $data = $request->only(['title', 'slug', 'sub_title', 'short_description', 'content', 'video_link', 'key_features', 'industries', 'meta_title', 'meta_description', 'meta_keywords', 'trade_information', 'advantages', 'related_products', 'parent_id', 'client_review_title', 'client_review_description']);
        if (empty($data['parent_id'])) {
            $data['parent_id'] = 0;
        }
        $data['design_type'] = 'design1'; // default and only design now
        $data['status'] = $request->status ? 'Active' : 'Inactive';
        $data['is_visible'] = $request->boolean('is_visible');
        $data['is_parent'] = $request->boolean('is_parent');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }
        
        if ($request->hasFile('banner_image')) {
            $data['banner_image'] = $request->file('banner_image')->store('products/banners', 'public');
        }

        if ($request->hasFile('brochure')) {
            $data['brochure'] = $request->file('brochure')->store('products/brochures', 'public');
        }

        // Handle Slider Images
        if ($request->hasFile('slider_images')) {
            $sliders = [];
            foreach ($request->file('slider_images') as $file) {
                $sliders[] = $file->store('products/sliders', 'public');
            }
            $data['slider_images'] = $sliders;
        }

        // Handle Client Review Images
        if ($request->hasFile('client_review_images')) {
            $cr_images = [];
            foreach ($request->file('client_review_images') as $file) {
                $cr_images[] = $file->store('products/client_reviews', 'public');
            }
            $data['client_review_images'] = $cr_images;
        }

        // Handle Client Review FAQs
        $client_review_faqs = [];
        if ($request->has('client_review_faqs')) {
            foreach ($request->client_review_faqs as $faq) {
                if (!empty($faq['question']) && !empty($faq['answer'])) {
                    $client_review_faqs[] = [
                        'question' => $faq['question'],
                        'answer' => $faq['answer'],
                    ];
                }
            }
        }
        $data['client_review_faqs'] = empty($client_review_faqs) ? null : $client_review_faqs;



        // Handle Process Steps
        $process_steps = [];
        if ($request->has('process_steps')) {
            foreach ($request->process_steps as $step) {
                $stepData = [
                    'title' => $step['title'] ?? null,
                    'description' => $step['description'] ?? null,
                ];
                if (isset($step['image']) && $step['image']->isValid()) {
                    $stepData['image'] = $step['image']->store('products/process_steps', 'public');
                }
                $process_steps[] = $stepData;
            }
        }
        $data['process_steps'] = empty($process_steps) ? null : $process_steps;

        // Handle Specially Designed Parts
        $specially_designed_parts = [];
        if ($request->has('specially_designed_parts')) {
            foreach ($request->specially_designed_parts as $part) {
                $partData = ['name' => $part['name'] ?? null];
                if (isset($part['image']) && $part['image']->isValid()) {
                    $partData['image'] = $part['image']->store('products/parts', 'public');
                }
                $specially_designed_parts[] = $partData;
            }
        }
        $data['specially_designed_parts'] = $specially_designed_parts;

        // Handle Image Parts
        $image_parts = [];
        if ($request->has('image_parts')) {
            foreach ($request->image_parts as $part) {
                $partData = ['name' => $part['name'] ?? null];
                if (isset($part['image']) && $part['image']->isValid()) {
                    $partData['image'] = $part['image']->store('products/image_parts', 'public');
                }
                $image_parts[] = $partData;
            }
        }
        $data['image_parts'] = $image_parts;

        $product = Product::create($data);

        if ($request->has('applications')) {
            $product->applications()->sync($request->applications);
        }

        if ($request->has('industries')) {
            $product->related_industries()->sync($request->industries);
        }

        // Handle sections for BOTH designs
        if ($request->has('sections')) {
            foreach ($request->sections as $section) {
                $sectionData = [
                    'title' => $section['title'] ?? null,
                    'sub_title' => $section['sub_title'] ?? null,
                    'content' => $section['content'] ?? null,
                    'video_link' => $section['video_link'] ?? null,
                    'table_headers' => $section['table_headers'] ?? null,
                    'table_data' => $section['table_data'] ?? null,
                ];

                if (isset($section['image']) && $section['image']->isValid()) {
                    $sectionData['image'] = $section['image']->store('products/sections', 'public');
                }
                if (isset($section['brochure']) && $section['brochure']->isValid()) {
                    $sectionData['brochure'] = $section['brochure']->store('products/sections/brochures', 'public');
                }

                $product->sections()->create($sectionData);
            }
        }

        // Handle multiple table specifications
        if ($request->has('spec_tables')) {
            foreach ($request->spec_tables as $spec) {
                if (!empty($spec['table_headers'])) {
                    $product->specifications()->create([
                        'table_headers' => $spec['table_headers'],
                        'table_data' => $spec['table_data'] ?? [],
                    ]);
                }
            }
        } elseif ($request->has('table_headers')) {
            // Fallback for single table if sent via old keys
            $product->specifications()->create([
                'table_headers' => $request->table_headers,
                'table_data' => $request->table_data ?? [],
            ]);
        }

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
    }

    public function edit(Product $product)
    {
        $all_industries = Industry::where('status', 'Active')->get();
        $all_applications = Application::where('status', 'Active')->get();
        $all_products = Product::where('status', 'Active')->where('id', '!=', $product->id)->get();
        $parent_products = Product::where('is_parent', true)->where('id', '!=', $product->id)->get();
        return view('backend.products.edit', compact('product', 'all_industries', 'all_applications', 'all_products', 'parent_products'));
    }

    public function update(Request $request, Product $product)
    {
        $request->merge([
            'slug' => $request->slug ?: \Illuminate\Support\Str::slug($request->title)
        ]);

        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug,' . $product->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        $data = $request->only(['title', 'slug', 'sub_title', 'short_description', 'content', 'video_link', 'key_features', 'industries', 'meta_title', 'meta_description', 'meta_keywords', 'trade_information', 'advantages', 'related_products', 'parent_id', 'client_review_title', 'client_review_description']);
        $data['advantages'] = $request->input('advantages', []);
        $data['key_features'] = $request->input('key_features', []);
        $data['related_products'] = $request->input('related_products', []);
        if (empty($data['parent_id'])) {
            $data['parent_id'] = 0;
        }
        $data['design_type'] = 'design1'; // default and only design now
        $data['status'] = $request->status ? 'Active' : 'Inactive';
        $data['is_visible'] = $request->boolean('is_visible');
        $data['is_parent'] = $request->boolean('is_parent');

        if ($request->has('delete_image') && $product->image) {
            Storage::disk('public')->delete($product->image);
            $data['image'] = null;
        }
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        if ($request->has('delete_banner_image') && $product->banner_image) {
            Storage::disk('public')->delete($product->banner_image);
            $data['banner_image'] = null;
        }
        if ($request->hasFile('banner_image')) {
            if ($product->banner_image) {
                Storage::disk('public')->delete($product->banner_image);
            }
            $data['banner_image'] = $request->file('banner_image')->store('products/banners', 'public');
        }

        if ($request->has('delete_brochure') && $product->brochure) {
            Storage::disk('public')->delete($product->brochure);
            $data['brochure'] = null;
        }
        if ($request->hasFile('brochure')) {
            if ($product->brochure) {
                Storage::disk('public')->delete($product->brochure);
            }
            $data['brochure'] = $request->file('brochure')->store('products/brochures', 'public');
        }

        // Handle Slider Images
        $sliders = $request->existing_slider_images ?? [];
        if ($request->hasFile('slider_images')) {
            foreach ($request->file('slider_images') as $file) {
                $sliders[] = $file->store('products/sliders', 'public');
            }
        }
        $data['slider_images'] = $sliders;

        // Cleanup removed slider images from storage
        if ($product->slider_images) {
            foreach ($product->slider_images as $old) {
                if (! in_array($old, $sliders)) {
                    Storage::disk('public')->delete($old);
                }
            }
        }

        // Handle Client Review Images
        $cr_images = $request->existing_client_review_images ?? [];
        if ($request->hasFile('client_review_images')) {
            foreach ($request->file('client_review_images') as $file) {
                $cr_images[] = $file->store('products/client_reviews', 'public');
            }
        }
        $data['client_review_images'] = $cr_images;

        // Cleanup removed client review images from storage
        if ($product->client_review_images) {
            foreach ($product->client_review_images as $old) {
                if (! in_array($old, $cr_images)) {
                    Storage::disk('public')->delete($old);
                }
            }
        }

        // Handle Client Review FAQs
        $client_review_faqs = [];
        if ($request->has('client_review_faqs')) {
            foreach ($request->client_review_faqs as $faq) {
                if (!empty($faq['question']) && !empty($faq['answer'])) {
                    $client_review_faqs[] = [
                        'question' => $faq['question'],
                        'answer' => $faq['answer'],
                    ];
                }
            }
        }
        $data['client_review_faqs'] = empty($client_review_faqs) ? null : $client_review_faqs;

        // Core Applications (Simplified to title list)
        if ($product->core_applications && is_array($product->core_applications)) {
            foreach ($product->core_applications as $oldApp) {
                if (is_array($oldApp) && isset($oldApp['image'])) {
                    Storage::disk('public')->delete($oldApp['image']);
                }
            }
        }
        $data['core_applications'] = $request->applications ?? null;

        // Handle Process Steps
        $process_steps = [];
        $kept_process_images = [];
        if ($request->has('process_steps')) {
            foreach ($request->process_steps as $step) {
                $stepData = [
                    'title' => $step['title'] ?? null,
                    'description' => $step['description'] ?? null,
                ];
                if (isset($step['image']) && $step['image']->isValid()) {
                    $stepData['image'] = $step['image']->store('products/process_steps', 'public');
                } elseif (isset($step['remove_image']) && $step['remove_image'] == '1') {
                    $stepData['image'] = null;
                } else {
                    $stepData['image'] = $step['existing_image'] ?? null;
                }
                if ($stepData['image']) {
                    $kept_process_images[] = $stepData['image'];
                }
                $process_steps[] = $stepData;
            }
        }
        $data['process_steps'] = empty($process_steps) ? null : $process_steps;

        // Cleanup old process steps images
        if ($product->process_steps) {
            foreach ($product->process_steps as $oldStep) {
                if (isset($oldStep['image']) && !in_array($oldStep['image'], $kept_process_images)) {
                    Storage::disk('public')->delete($oldStep['image']);
                }
            }
        }

        // Handle Specially Designed Parts
        $specially_designed_parts = [];
        $kept_special_images = [];
        if ($request->has('specially_designed_parts')) {
            foreach ($request->specially_designed_parts as $part) {
                $partData = ['name' => $part['name'] ?? null];
                if (isset($part['image']) && $part['image']->isValid()) {
                    $partData['image'] = $part['image']->store('products/parts', 'public');
                } elseif (isset($part['remove_image']) && $part['remove_image'] == '1') {
                    $partData['image'] = null;
                } else {
                    $partData['image'] = $part['existing_image'] ?? null;
                }
                if ($partData['image']) {
                    $kept_special_images[] = $partData['image'];
                }
                $specially_designed_parts[] = $partData;
            }
        }
        $data['specially_designed_parts'] = $specially_designed_parts;

        // Cleanup old specially designed part images
        if ($product->specially_designed_parts) {
            foreach ($product->specially_designed_parts as $oldPart) {
                if (isset($oldPart['image']) && !in_array($oldPart['image'], $kept_special_images)) {
                    Storage::disk('public')->delete($oldPart['image']);
                }
            }
        }

        // Handle Image Parts
        $image_parts = [];
        $kept_image_parts_images = [];
        if ($request->has('image_parts')) {
            foreach ($request->image_parts as $part) {
                $partData = ['name' => $part['name'] ?? null];
                if (isset($part['image']) && $part['image']->isValid()) {
                    $partData['image'] = $part['image']->store('products/image_parts', 'public');
                } elseif (isset($part['remove_image']) && $part['remove_image'] == '1') {
                    $partData['image'] = null;
                } else {
                    $partData['image'] = $part['existing_image'] ?? null;
                }
                if ($partData['image']) {
                    $kept_image_parts_images[] = $partData['image'];
                }
                $image_parts[] = $partData;
            }
        }
        $data['image_parts'] = $image_parts;

        // Cleanup old image part images
        if ($product->image_parts) {
            foreach ($product->image_parts as $oldPart) {
                if (isset($oldPart['image']) && !in_array($oldPart['image'], $kept_image_parts_images)) {
                    Storage::disk('public')->delete($oldPart['image']);
                }
            }
        }

        $product->update($data);

        if ($request->has('applications')) {
            $product->applications()->sync($request->applications);
        } else {
            $product->applications()->detach();
        }

        if ($request->has('industries')) {
            $product->related_industries()->sync($request->industries);
        } else {
            $product->related_industries()->detach();
        }

        // Delete marked sections
        if ($request->has('delete_sections')) {
            ProductSection::whereIn('id', $request->delete_sections)->delete();
        }

        // Update existing sections
        if ($request->has('existing_sections')) {
            foreach ($request->existing_sections as $id => $sectionData) {
                $section = ProductSection::find($id);
                if (! $section) {
                    continue;
                }
                $section->title = $sectionData['title'] ?? null;
                $section->sub_title = $sectionData['sub_title'] ?? null;
                $section->content = $sectionData['content'] ?? null;
                $section->video_link = $sectionData['video_link'] ?? null;
                $section->table_headers = $sectionData['table_headers'] ?? null;
                $section->table_data = $sectionData['table_data'] ?? null;
                if (isset($sectionData['image']) && $sectionData['image']->isValid()) {
                    if ($section->image) {
                        Storage::disk('public')->delete($section->image);
                    }
                    $section->image = $sectionData['image']->store('products/sections', 'public');
                }
                if (isset($sectionData['delete_brochure']) && $section->brochure) {
                    Storage::disk('public')->delete($section->brochure);
                    $section->brochure = null;
                }
                if (isset($sectionData['brochure']) && $sectionData['brochure']->isValid()) {
                    if ($section->brochure) {
                        Storage::disk('public')->delete($section->brochure);
                    }
                    $section->brochure = $sectionData['brochure']->store('products/sections/brochures', 'public');
                }
                $section->save();
            }
        }

        // Add new sections
        if ($request->has('sections')) {
            foreach ($request->sections as $sectionData) {
                $newSection = [
                    'title' => $sectionData['title'] ?? null,
                    'sub_title' => $sectionData['sub_title'] ?? null,
                    'content' => $sectionData['content'] ?? null,
                    'video_link' => $sectionData['video_link'] ?? null,
                    'table_headers' => $sectionData['table_headers'] ?? null,
                    'table_data' => $sectionData['table_data'] ?? null,
                ];
                if (isset($sectionData['image']) && $sectionData['image']->isValid()) {
                    $newSection['image'] = $sectionData['image']->store('products/sections', 'public');
                }
                if (isset($sectionData['brochure']) && $sectionData['brochure']->isValid()) {
                    $newSection['brochure'] = $sectionData['brochure']->store('products/sections/brochures', 'public');
                }
                $product->sections()->create($newSection);
            }
        }

        // Update multiple specification tables
        if ($request->has('spec_tables') || $request->has('table_headers')) {
            $product->specifications()->delete();
            
            if ($request->has('spec_tables')) {
                foreach ($request->spec_tables as $spec) {
                    if (!empty($spec['table_headers'])) {
                        $product->specifications()->create([
                            'table_headers' => $spec['table_headers'],
                            'table_data' => $spec['table_data'] ?? [],
                        ]);
                    }
                }
            } elseif ($request->has('table_headers')) {
                $product->specifications()->create([
                    'table_headers' => $request->table_headers,
                    'table_data' => $request->table_data ?? [],
                ]);
            }
        }
        $type = $product->original_product_id ? 'copy' : 'original';
        return redirect()->route('admin.products.index', ['type' => $type])->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        $type = $product->original_product_id ? 'copy' : 'original';
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        if ($product->banner_image) {
            Storage::disk('public')->delete($product->banner_image);
        }
        if ($product->brochure) {
            Storage::disk('public')->delete($product->brochure);
        }
        if ($product->client_review_images) {
            foreach ($product->client_review_images as $img) {
                Storage::disk('public')->delete($img);
            }
        }
        if ($product->process_steps) {
            foreach ($product->process_steps as $step) {
                if (isset($step['image'])) {
                    Storage::disk('public')->delete($step['image']);
                }
            }
        }
        $product->delete();

        return redirect()->route('admin.products.index', ['type' => $type])->with('success', 'Product deleted successfully!');
    }

    public function copy(Product $product)
    {
        $newProduct = $product->replicate();
        $newProduct->original_product_id = $product->id;
        $newProduct->title = $newProduct->title . ' (Copy)';
        $newProduct->slug = \Illuminate\Support\Str::slug($newProduct->title) . '-' . time();
        $newProduct->status = 'Inactive';
        $newProduct->is_visible = false;
        $newProduct->save();

        if ($product->related_industries) {
            $newProduct->related_industries()->sync($product->related_industries->pluck('id'));
        }
        if ($product->applications) {
            $newProduct->applications()->sync($product->applications->pluck('id'));
        }

        foreach ($product->sections as $section) {
            $newSection = $section->replicate();
            $newSection->product_id = $newProduct->id;
            $newSection->save();
        }

        foreach ($product->specifications as $spec) {
            $newSpec = $spec->replicate();
            $newSpec->product_id = $newProduct->id;
            $newSpec->save();
        }

        return redirect()->route('admin.products.edit', $newProduct)->with('success', 'Product copied successfully! You are now editing the copy.');
    }
}
