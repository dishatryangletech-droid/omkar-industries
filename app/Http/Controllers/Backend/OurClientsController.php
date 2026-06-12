<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OurClientsController extends Controller
{
    public function index()
    {
        $content = HomePage::where('section_type', 'our_clients')->first() ?? new HomePage;

        return view('backend.website-pages.our-clients.index', compact('content'));
    }

    public function update(Request $request)
    {
        $content = HomePage::where('section_type', 'clients_section')->first() ?? new HomePage;

        $request->validate([
            'title' => 'nullable|string|max:255',
            'background_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'video_file' => 'nullable|mimes:mp4,mov,ogg,qt|max:50000',
        ]);

        $data = [
            'section_type' => 'our_clients',
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'btn_link' => $request->video_link,
            'subtitle_text1' => $request->subtitle_text1,
            'subtitle_count1' => $request->subtitle_count1,
            'subtitle_text2' => $request->subtitle_text2,
            'subtitle_dsc1' => $request->subtitle_dsc1,
            'subtitle_text3' => $request->subtitle_text3,
            'subtitle_count2' => $request->subtitle_count2,
            'subtitle_dsc2' => $request->subtitle_dsc2,
            'status' => 'Active',
        ];

        if ($request->hasFile('background_photo')) {
            if ($content->background_photo) {
                Storage::disk('public')->delete($content->background_photo);
            }
            $data['background_photo'] = $request->file('background_photo')->store('our_clients', 'public');
        }

        if ($request->hasFile('video_file')) {
            if ($content->video_file) {
                Storage::disk('public')->delete($content->video_file);
            }
            $data['video_file'] = $request->file('video_file')->store('our_clients', 'public');
        }

        if ($content->exists) {
            $content->update($data);
        } else {
            HomePage::create($data);
        }

        return redirect()->back()->with('success', 'Video section updated successfully.');
    }
}
