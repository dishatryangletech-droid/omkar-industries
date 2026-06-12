<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FooterSetting;
use Illuminate\Http\Request;

class FooterSettingController extends Controller
{
    public function index()
    {
        $settings = FooterSetting::first() ?? new FooterSetting;

        return view('backend.website-pages.footer-settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'phone_1' => 'nullable|string|max:255',
            'phone_2' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'facebook_link' => 'nullable|url|max:255',
            'twitter_link' => 'nullable|url|max:255',
            'linkedin_link' => 'nullable|url|max:255',
            'instagram_link' => 'nullable|url|max:255',
        ]);

        $settings = FooterSetting::first() ?? new FooterSetting;

        // Process Links
        $quickLinks = [];
        if ($request->has('quick_links')) {
            foreach ($request->quick_links['title'] as $key => $title) {
                if (! empty($title)) {
                    $quickLinks[] = [
                        'title' => $title,
                        'url' => $request->quick_links['url'][$key] ?? '',
                    ];
                }
            }
        }

        $otherLinks = [];
        if ($request->has('other_links')) {
            foreach ($request->other_links['title'] as $key => $title) {
                if (! empty($title)) {
                    $otherLinks[] = [
                        'title' => $title,
                        'url' => $request->other_links['url'][$key] ?? '',
                    ];
                }
            }
        }

        $settings->fill($request->only([
            'phone_1', 'phone_2', 'whatsapp', 'email', 'address',
            'facebook_link', 'twitter_link', 'linkedin_link', 'instagram_link',
        ]));

        $settings->quick_links = $quickLinks;
        $settings->other_links = $otherLinks;
        $settings->save();

        return redirect()->back()->with('success', 'Footer settings updated successfully.');
    }
}
