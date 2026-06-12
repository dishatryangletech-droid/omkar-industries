<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use App\Models\Industry;
use Illuminate\Http\Request;

class IndustrySectionController extends Controller
{
    public function index()
    {
        $content = HomePage::where('section_type', 'industry_section')->first() ?? new HomePage;
        $industries = Industry::where('status', 'Active')
            ->where('is_visible', true)
            ->get();

        return view('backend.website-pages.industry-section.index', compact('content', 'industries'));
    }

    public function update(Request $request)
    {
        $content = HomePage::where('section_type', 'industry_section')->first() ?? new HomePage;

        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $data = [
            'section_type' => 'industry_section',
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'btn_title' => $request->btn_title,
            'btn_link' => $request->btn_link,
            'subtitle_text1' => $request->industry_id1,
            'subtitle_text2' => $request->industry_id2,
            'subtitle_text3' => $request->industry_id3,
            'subtitle_text4' => $request->industry_id4,
            'subtitle_text5' => $request->industry_id5,
            'status' => 'Active',
        ];

        if ($content->exists) {
            $content->update($data);
        } else {
            HomePage::create($data);
        }

        return redirect()->back()->with('success', 'Industry section updated successfully.');
    }
}
