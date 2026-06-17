<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\HomePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::orderBy('sort_order', 'asc')->get();
        $content = HomePage::where('section_type', 'faq_section')->first() ?? new HomePage;

        return view('backend.faqs.index', compact('faqs', 'content'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:Active,Inactive',
        ]);

        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        return view('backend.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:Active,Inactive',
        ]);

        $faq->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ deleted successfully.');
    }

    /**
     * Update general FAQ section configurations.
     */
    public function updateSection(Request $request)
    {
        $content = HomePage::where('section_type', 'faq_section')->first() ?? new HomePage;

        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'btn_title' => 'nullable|string|max:255', // used for phone
            'btn_link' => 'nullable|string|max:255',  // used for email
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $data = [
            'section_type' => 'faq_section',
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'btn_title' => $request->btn_title,
            'btn_link' => $request->btn_link,
            'status' => 'Active',
        ];

        if ($request->hasFile('photo')) {
            if ($content->photo) {
                Storage::disk('public')->delete($content->photo);
            }
            $data['photo'] = $request->file('photo')->store('faq_section', 'public');
        }

        if ($content->exists) {
            $content->update($data);
        } else {
            HomePage::create($data);
        }

        return redirect()->back()->with('success', 'FAQ section settings updated successfully.');
    }
}
