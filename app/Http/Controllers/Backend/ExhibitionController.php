<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Exhibition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExhibitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exhibitions = Exhibition::latest()->get();

        return view('backend.website-pages.exhibitions.index', compact('exhibitions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.website-pages.exhibitions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'scheduled_period' => 'nullable|string|max:255',
            'venue' => 'nullable|string|max:255',
            'space' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:Active,Inactive',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('exhibitions', 'public');
        }

        Exhibition::create($data);

        return redirect()->route('admin.website-pages.exhibitions.index')->with('success', 'Exhibition created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exhibition $exhibition)
    {
        return view('backend.website-pages.exhibitions.edit', compact('exhibition'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exhibition $exhibition)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'scheduled_period' => 'nullable|string|max:255',
            'venue' => 'nullable|string|max:255',
            'space' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:Active,Inactive',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($exhibition->image) {
                Storage::disk('public')->delete($exhibition->image);
            }
            $data['image'] = $request->file('image')->store('exhibitions', 'public');
        }

        $exhibition->update($data);

        return redirect()->route('admin.website-pages.exhibitions.index')->with('success', 'Exhibition updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exhibition $exhibition)
    {
        if ($exhibition->image) {
            Storage::disk('public')->delete($exhibition->image);
        }

        $exhibition->delete();

        return redirect()->route('admin.website-pages.exhibitions.index')->with('success', 'Exhibition deleted successfully.');
    }
}
