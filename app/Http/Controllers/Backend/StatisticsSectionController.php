<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use Illuminate\Http\Request;

class StatisticsSectionController extends Controller
{
    public function index()
    {
        $content = HomePage::where('section_type', 'statistics_section')->first() ?? new HomePage;

        return view('backend.website-pages.statistics-section.index', compact('content'));
    }

    public function update(Request $request)
    {
        $content = HomePage::where('section_type', 'statistics_section')->first() ?? new HomePage;

        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $data = [
            'section_type' => 'statistics_section',
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'subtitle_text1' => $request->stat_title1,
            'subtitle_count1' => $request->stat_count1,
            'subtitle_dsc1' => $request->stat_desc1,
            'subtitle_text2' => $request->stat_title2,
            'subtitle_count2' => $request->stat_count2,
            'subtitle_dsc2' => $request->stat_desc2,
            'subtitle_text3' => $request->stat_title3,
            'subtitle_count3' => $request->stat_count3,
            'subtitle_dsc3' => $request->stat_desc3,
            'status' => 'Active',
        ];

        if ($content->exists) {
            $content->update($data);
        } else {
            HomePage::create($data);
        }

        return redirect()->back()->with('success', 'Statistics section updated successfully.');
    }
}
