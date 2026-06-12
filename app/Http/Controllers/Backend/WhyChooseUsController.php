<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WhyChooseUsController extends Controller
{
    public function index()
    {
        $content = HomePage::where('section_type', 'why_choose_us')->first() ?? new HomePage;

        return view('backend.website-pages.why-choose-us.index', compact('content'));
    }

    public function update(Request $request)
    {
        $content = HomePage::where('section_type', 'why_choose_us')->first() ?? new HomePage;

        $request->validate([
            'title' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $data = [
            'section_type' => 'why_choose_us',
            'title' => $request->title,
            'subtitle' => $request->sub_title,
            'description' => $request->description,
            'btn_title' => $request->btn_title,
            'btn_link' => $request->btn_link,
            'subtitle_text1' => $request->feature_title1,
            'subtitle_dsc1' => $request->feature_description1,
            'subtitle_count1' => $request->feature_count1,
            'subtitle_text2' => $request->feature_title2,
            'subtitle_dsc2' => $request->feature_description2,
            'subtitle_count2' => $request->feature_count2,
            'subtitle_text3' => $request->feature_title3,
            'subtitle_dsc3' => $request->feature_description3,
            'subtitle_count3' => $request->feature_count3,
            'subtitle_text4' => $request->feature_title4,
            'subtitle_dsc4' => $request->feature_description4,
            'subtitle_count4' => $request->feature_count4,
            'status' => 'Active',
        ];

        if ($request->hasFile('photo')) {
            if ($content->photo) {
                Storage::disk('public')->delete($content->photo);
            }
            $data['photo'] = $request->file('photo')->store('why_choose_us', 'public');
        }

        if ($content->exists) {
            $content->update($data);
        } else {
            HomePage::create($data);
        }

        return redirect()->back()->with('success', 'Why Choose Us content updated successfully.');
    }
}
