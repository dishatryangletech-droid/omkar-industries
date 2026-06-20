<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();

        return view('backend.website-pages.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('backend.website-pages.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'main_title_color' => 'nullable|string|max:7',
            'subtitle' => 'nullable|string|max:255',
            'sub_title_color' => 'nullable|string|max:7',
            'sub_title_bg_color' => 'nullable|string|max:7',
            'description' => 'nullable|string',
            'description_color' => 'nullable|string|max:7',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'background_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'btn_title' => 'nullable|string|max:255',
            'btn_link' => 'nullable|string|max:255',
            'btn_color' => 'nullable|string|max:7',
            'btn_text_color' => 'nullable|string|max:7',
            'btn_hover_color' => 'nullable|string|max:7',
            'btn_hover_text_color' => 'nullable|string|max:7',
            'status' => 'required|in:Active,Inactive',
            'full_screen' => 'nullable|boolean',
        ]);

        $data = $request->all();
        $data['full_screen'] = $request->boolean('full_screen');

        if (!$request->boolean('customize_btn_colors')) {
            $data['btn_color'] = null;
            $data['btn_text_color'] = null;
            $data['btn_hover_color'] = null;
            $data['btn_hover_text_color'] = null;
        }

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('sliders', 'public');
        }

        if ($request->hasFile('background_photo')) {
            $data['background_photo'] = $request->file('background_photo')->store('sliders/bg', 'public');
        }

        Slider::create($data);

        return redirect()->route('admin.website-pages.sliders.index')->with('success', 'Slider created successfully.');
    }

    public function edit(Slider $slider)
    {
        return view('backend.website-pages.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'main_title_color' => 'nullable|string|max:7',
            'subtitle' => 'nullable|string|max:255',
            'sub_title_color' => 'nullable|string|max:7',
            'sub_title_bg_color' => 'nullable|string|max:7',
            'description' => 'nullable|string',
            'description_color' => 'nullable|string|max:7',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'background_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'btn_title' => 'nullable|string|max:255',
            'btn_link' => 'nullable|string|max:255',
            'btn_color' => 'nullable|string|max:7',
            'btn_text_color' => 'nullable|string|max:7',
            'btn_hover_color' => 'nullable|string|max:7',
            'btn_hover_text_color' => 'nullable|string|max:7',
            'status' => 'required|in:Active,Inactive',
            'full_screen' => 'nullable|boolean',
        ]);

        $data = $request->all();
        $data['full_screen'] = $request->boolean('full_screen');

        if (!$request->boolean('customize_btn_colors')) {
            $data['btn_color'] = null;
            $data['btn_text_color'] = null;
            $data['btn_hover_color'] = null;
            $data['btn_hover_text_color'] = null;
        }

        if ($request->hasFile('photo')) {
            if ($slider->photo) {
                Storage::disk('public')->delete($slider->photo);
            }
            $data['photo'] = $request->file('photo')->store('sliders', 'public');
        } elseif ($request->boolean('delete_photo')) {
            if ($slider->photo) {
                Storage::disk('public')->delete($slider->photo);
            }
            $data['photo'] = null;
        }

        if ($request->hasFile('background_photo')) {
            if ($slider->background_photo) {
                Storage::disk('public')->delete($slider->background_photo);
            }
            $data['background_photo'] = $request->file('background_photo')->store('sliders/bg', 'public');
        } elseif ($request->boolean('delete_background_photo')) {
            if ($slider->background_photo) {
                Storage::disk('public')->delete($slider->background_photo);
            }
            $data['background_photo'] = null;
        }

        $slider->update($data);

        return redirect()->route('admin.website-pages.sliders.index')->with('success', 'Slider updated successfully.');
    }

    public function destroy(Slider $slider)
    {
        if ($slider->photo) {
            Storage::disk('public')->delete($slider->photo);
        }
        if ($slider->background_photo) {
            Storage::disk('public')->delete($slider->background_photo);
        }
        $slider->delete();

        return redirect()->route('admin.website-pages.sliders.index')->with('success', 'Slider deleted successfully.');
    }
}
