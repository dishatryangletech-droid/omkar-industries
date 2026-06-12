<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HeaderSetting;
use App\Models\Industry;
use App\Models\Product;
use Illuminate\Http\Request;

class HeaderSettingController extends Controller
{
    public function index()
    {
        $settings = HeaderSetting::first() ?? new HeaderSetting;
        $products = Product::where('status', 'Active')
            ->where(function($q) {
                $q->whereNull('parent_id')
                  ->orWhere('parent_id', 0)
                  ->orWhere('parent_id', '');
            })
            ->get();
        $industries = Industry::where('status', 'Active')
            ->where('is_visible', true)
            ->get();

        return view('backend.website-pages.header-settings', compact('settings', 'products', 'industries'));
    }

    public function update(Request $request)
    {
        $settings = HeaderSetting::first() ?? new HeaderSetting;

        $settings->premium_machines = $request->premium_machines ?? [];
        $settings->all_machines = $request->all_machines ?? [];
        $settings->industries = $request->industries ?? [];

        $settings->save();

        return redirect()->back()->with('success', 'Header settings updated successfully.');
    }
}
