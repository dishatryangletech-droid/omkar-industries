<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class IndustryController extends Controller
{
    public function index()
    {
        $industries = Industry::latest()->get();

        return view('backend.industries.index', compact('industries'));
    }

    public function create()
    {
        $products = Product::orderBy('title')->get();

        return view('backend.industries.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:industries,slug',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,webp,jfif,bmp|max:5120',
            'banner_image' => 'nullable|file|mimes:jpeg,png,jpg,webp,jfif,bmp|max:5120',
            'overview_image' => 'nullable|file|mimes:jpeg,png,jpg,webp,jfif,bmp|max:5120',
            'brochure' => 'nullable|file|mimes:pdf|max:10240',
            'status' => 'required|in:Active,Inactive',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        $data = $request->except(['image', 'banner_image', 'overview_image', 'brochure', 'products']);
        $data['is_visible'] = $request->has('is_visible');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('industries', 'public');
        }
        if ($request->hasFile('banner_image')) {
            $data['banner_image'] = $request->file('banner_image')->store('industries/banners', 'public');
        }
        if ($request->hasFile('overview_image')) {
            $data['overview_image'] = $request->file('overview_image')->store('industries/overviews', 'public');
        }
        if ($request->hasFile('brochure')) {
            $data['brochure'] = $request->file('brochure')->store('industries/brochures', 'public');
        }

        $industry = Industry::create($data);

        if ($request->has('products')) {
            $industry->products()->sync($request->products);
        }

        return redirect()->route('backend.industries.index')->with('success', 'Industry created successfully.');
    }

    public function edit(Industry $industry)
    {
        $products = Product::orderBy('title')->get();
        $selectedProducts = $industry->products()->pluck('products.id')->toArray();

        return view('backend.industries.edit', compact('industry', 'products', 'selectedProducts'));
    }

    public function update(Request $request, Industry $industry)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:industries,slug,' . $industry->id,
            'image' => 'nullable|file|mimes:jpeg,png,jpg,webp,jfif,bmp|max:5120',
            'banner_image' => 'nullable|file|mimes:jpeg,png,jpg,webp,jfif,bmp|max:5120',
            'overview_image' => 'nullable|file|mimes:jpeg,png,jpg,webp,jfif,bmp|max:5120',
            'brochure' => 'nullable|file|mimes:pdf|max:10240',
            'status' => 'required|in:Active,Inactive',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        $data = $request->except(['image', 'banner_image', 'overview_image', 'brochure', 'products']);
        $data['is_visible'] = $request->has('is_visible');

        if ($request->has('delete_image') && $industry->image) {
            Storage::disk('public')->delete($industry->image);
            $data['image'] = null;
        }
        if ($request->hasFile('image')) {
            if ($industry->image) {
                Storage::disk('public')->delete($industry->image);
            }
            $data['image'] = $request->file('image')->store('industries', 'public');
        }

        if ($request->has('delete_banner_image') && $industry->banner_image) {
            Storage::disk('public')->delete($industry->banner_image);
            $data['banner_image'] = null;
        }
        if ($request->hasFile('banner_image')) {
            if ($industry->banner_image) {
                Storage::disk('public')->delete($industry->banner_image);
            }
            $data['banner_image'] = $request->file('banner_image')->store('industries/banners', 'public');
        }

        if ($request->hasFile('overview_image')) {
            if ($industry->overview_image) {
                Storage::disk('public')->delete($industry->overview_image);
            }
            $data['overview_image'] = $request->file('overview_image')->store('industries/overviews', 'public');
        }

        if ($request->has('delete_brochure') && $industry->brochure) {
            Storage::disk('public')->delete($industry->brochure);
            $data['brochure'] = null;
        }
        if ($request->hasFile('brochure')) {
            if ($industry->brochure) {
                Storage::disk('public')->delete($industry->brochure);
            }
            $data['brochure'] = $request->file('brochure')->store('industries/brochures', 'public');
        }

        $industry->update($data);

        if ($request->has('products')) {
            $industry->products()->sync($request->products);
        } else {
            $industry->products()->detach();
        }

        return redirect()->route('backend.industries.index')->with('success', 'Industry updated successfully.');
    }

    public function destroy(Industry $industry)
    {
        if ($industry->image) {
            Storage::disk('public')->delete($industry->image);
        }
        if ($industry->banner_image) {
            Storage::disk('public')->delete($industry->banner_image);
        }
        if ($industry->overview_image) {
            Storage::disk('public')->delete($industry->overview_image);
        }
        if ($industry->brochure) {
            Storage::disk('public')->delete($industry->brochure);
        }

        $industry->delete();

        return redirect()->route('backend.industries.index')->with('success', 'Industry deleted successfully.');
    }

    public function toggleVisibility(Request $request, Industry $industry)
    {
        $request->validate([
            'is_visible' => 'required|boolean'
        ]);

        $industry->update([
            'is_visible' => $request->is_visible
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Industry visibility updated successfully.'
        ]);
    }
}
