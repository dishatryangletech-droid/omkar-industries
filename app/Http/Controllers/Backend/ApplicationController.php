<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::latest()->get();

        return view('backend.applications.index', compact('applications'));
    }

    public function create()
    {
        $products = Product::orderBy('title')->get();

        return view('backend.applications.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'status' => 'required|in:Active,Inactive',
        ]);

        $data = $request->only(['title', 'sub_title']);
        $data['status'] = $request->status === 'Active' ? 1 : 0;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('applications', 'public');
        }

        $application = Application::create($data);

        return redirect()->route('backend.applications.index')->with('success', 'Application created successfully.');
    }

    public function edit(Application $application)
    {
        $products = Product::orderBy('title')->get();
        $selectedProducts = $application->products()->pluck('products.id')->toArray();

        return view('backend.applications.edit', compact('application', 'products', 'selectedProducts'));
    }

    public function update(Request $request, Application $application)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'status' => 'required|in:Active,Inactive',
        ]);

        $data = $request->only(['title', 'sub_title']);
        $data['status'] = $request->status === 'Active' ? 1 : 0;

        if ($request->hasFile('image')) {
            if ($application->image) {
                Storage::disk('public')->delete($application->image);
            }
            $data['image'] = $request->file('image')->store('applications', 'public');
        }

        $application->update($data);

        return redirect()->route('backend.applications.index')->with('success', 'Application updated successfully.');
    }

    public function destroy(Application $application)
    {
        if ($application->image) {
            Storage::disk('public')->delete($application->image);
        }
        $application->delete();

        return redirect()->route('backend.applications.index')->with('success', 'Application deleted successfully.');
    }
}
