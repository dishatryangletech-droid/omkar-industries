<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\AboutUsPageCheckpoint;
use App\Models\HomePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    public function index()
    {
        // Main Section from HomePage
        $mainSection = HomePage::where('section_type', 'about_us')->first() ?? new HomePage;

        // Strategic Boxes from AboutUs (Mission, Vision, Goal)
        $mission = AboutUs::find(1) ?? new AboutUs(['id' => 1]);
        $vision = AboutUs::find(2) ?? new AboutUs(['id' => 2]);
        $goal = AboutUs::find(3) ?? new AboutUs(['id' => 3]);

        return view('backend.website-pages.about-us.index', compact('mainSection', 'mission', 'vision', 'goal'));
    }

    public function update(Request $request)
    {
        // 1. Update Main Section in HomePage
        $mainSection = HomePage::where('section_type', 'about_us')->first() ?? new HomePage;

        $request->validate([
            'title' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $mainData = [
            'section_type' => 'about_us',
            'title' => $request->title,
            'subtitle' => $request->sub_title,
            'description' => $request->description,
            'btn_title' => $request->btn_title,
            'btn_link' => $request->btn_link,
            'btn_link2' => $request->btn_link2,
            'subtitle_text1' => $request->subtitle_text1,
            'subtitle_text2' => $request->subtitle_text2,
            'subtitle_text3' => $request->subtitle_text3,
            'subtitle_text4' => $request->subtitle_text4,
            'subtitle_text5' => $request->subtitle_text5,
            'subtitle_text6' => $request->subtitle_text6,
            'subtitle_text7' => $request->subtitle_text7,
            'subtitle_text8' => $request->subtitle_text8,
            'subtitle_count1' => $request->subtitle_count1,
            'subtitle_count2' => $request->subtitle_count2,
            'subtitle_count3' => $request->subtitle_count3,
            'subtitle_dsc1' => $request->subtitle_dsc1,
            'subtitle_dsc2' => $request->subtitle_dsc2,
            'subtitle_dsc3' => $request->subtitle_dsc3,
            'business_specs' => $request->business_specs,
            'status' => 'Active',
        ];

        if ($request->hasFile('photo')) {
            if ($mainSection->photo) {
                Storage::disk('public')->delete($mainSection->photo);
            }
            $mainData['photo'] = $request->file('photo')->store('about_us', 'public');
        }

        if ($mainSection->exists) {
            $mainSection->update($mainData);
        } else {
            $mainSection = HomePage::create($mainData);
        }

        // 2. Update Strategic Boxes in AboutUs table (ID 1, 2, 3)
        $boxes = [
            1 => ['title' => 'mission_title', 'desc' => 'mission_description'],
            2 => ['title' => 'vision_title', 'desc' => 'vision_description'],
            3 => ['title' => 'goal_title', 'desc' => 'goal_description'],
        ];

        foreach ($boxes as $id => $fields) {
            $box = AboutUs::find($id);
            $boxData = [
                'sub_content_title' => $request->input($fields['title']),
                'sub_content_description' => $request->input($fields['desc']),
                'status' => 'Active',
            ];

            if ($box) {
                $box->update($boxData);
            } else {
                $boxData['id'] = $id;
                AboutUs::create($boxData);
            }
        }

        // 3. Update Checkpoints in AboutUsPageCheckpoint table
        if ($mainSection) {
            AboutUsPageCheckpoint::where('home_page_id', $mainSection->id)->delete();

            $checkpointTypes = ['mission', 'vision', 'goal'];
            foreach ($checkpointTypes as $type) {
                $fieldName = $type.'_checkpoints';
                if ($request->has($fieldName)) {
                    foreach ($request->get($fieldName) as $title) {
                        if (! empty($title)) {
                            AboutUsPageCheckpoint::create([
                                'home_page_id' => $mainSection->id,
                                'title' => $title,
                                'type' => $type,
                                'status' => 'Active',
                            ]);
                        }
                    }
                }
            }
        }

        return redirect()->route('backend.website-pages.about-us.index')->with('success', 'About Us content updated successfully.');
    }
}
