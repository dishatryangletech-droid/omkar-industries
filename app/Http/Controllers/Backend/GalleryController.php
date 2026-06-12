<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();
        $totalGallery = Gallery::count();

        return view('backend.gallery.index', compact('galleries', 'totalGallery'));
    }

    public function create()
    {
        return view('backend.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tab_name' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        Gallery::create([
            'tab_name' => $request->tab_name,
            'status' => $request->status,
            'images' => [],
        ]);

        return redirect()->route('backend.gallery.index')->with('success', 'Gallery tab created successfully.');
    }

    public function show(Gallery $gallery)
    {
        return view('backend.gallery.show', compact('gallery'));
    }

    public function edit(Gallery $gallery)
    {
        return view('backend.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'tab_name' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        $gallery->update([
            'tab_name' => $request->tab_name,
            'status' => $request->status,
        ]);

        return redirect()->route('backend.gallery.index')->with('success', 'Gallery tab updated successfully.');
    }

    public function uploadImages(Request $request, Gallery $gallery)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $existingImages = $gallery->images ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $existingImages[] = $file->store('galleries', 'public');
            }
        }

        $gallery->update(['images' => $existingImages]);

        return back()->with('success', 'Images uploaded successfully.');
    }

    public function deleteImage(Request $request, Gallery $gallery)
    {
        $imagePath = $request->image_path;
        $existingImages = $gallery->images ?? [];

        if (($key = array_search($imagePath, $existingImages)) !== false) {
            unset($existingImages[$key]);
            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
        }

        $gallery->update(['images' => array_values($existingImages)]);

        return back()->with('success', 'Image deleted successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->images) {
            foreach ($gallery->images as $image) {
                if (Storage::disk('public')->exists($image)) {
                    Storage::disk('public')->delete($image);
                }
            }
        }
        $gallery->delete();

        return redirect()->route('backend.gallery.index')->with('success', 'Gallery deleted successfully.');
    }
}
