<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class DefaultImageSettingController extends Controller
{
    public function index(): View
    {
        $settings = GeneralSetting::first() ?? new GeneralSetting;

        return view('backend.website-pages.default-image-settings', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'default_banner_image' => 'nullable|image|max:5120',
            'default_application_image' => 'nullable|image|max:5120',
            'default_product_image' => 'nullable|image|max:5120',
            'default_industry_image' => 'nullable|image|max:5120',
        ]);

        $settings = GeneralSetting::first();
        if (! $settings) {
            $settings = new GeneralSetting;
        }

        $imageFields = [
            'default_banner_image',
            'default_application_image',
            'default_product_image',
            'default_industry_image',
        ];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                // Delete old image if it exists
                if ($settings->$field) {
                    Storage::disk('public')->delete($settings->$field);
                }
                // Store new image
                if ($field === 'default_banner_image') {
                    $path = $request->file($field)->store('page_banners', 'public');
                } else {
                    $path = $request->file($field)->store('general_settings', 'public');
                }
                $settings->$field = $path;
            }
        }

        $settings->save();

        return redirect()->back()->with('success', 'Default image settings updated successfully.');
    }
}
