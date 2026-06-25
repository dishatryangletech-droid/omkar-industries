<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class GeneralSettingController extends Controller
{
    public function index(): View
    {
        $settings = GeneralSetting::first() ?? new GeneralSetting;

        return view('backend.website-pages.general-settings', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:255',
            'contact_address' => 'nullable|string',
            'short_contact_address' => 'nullable|string|max:255',
            'map_iframe' => 'nullable|string',
            'working_days' => 'nullable|string|max:255',
            'director_details' => 'nullable|string',
            'company_about_text' => 'nullable|string',
            'product_grid_columns' => 'nullable|integer|in:2,3,4',
        ]);

        $settings = GeneralSetting::first();
        if (! $settings) {
            $settings = new GeneralSetting;
        }

        $settings->contact_email = $request->contact_email;
        $settings->contact_phone = $request->contact_phone;
        $settings->contact_address = $request->contact_address;
        $settings->short_contact_address = $request->short_contact_address;
        $settings->map_iframe = $request->map_iframe;
        $settings->working_days = $request->working_days;
        $settings->director_details = $request->director_details;
        $settings->company_about_text = $request->company_about_text;
        if ($request->has('product_grid_columns')) {
            $settings->product_grid_columns = $request->product_grid_columns;
        }

        $settings->save();

        return redirect()->back()->with('success', 'General settings (contact details) updated successfully.');
    }
}
