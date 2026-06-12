<?php

namespace App\Http\Controllers;

use App\Models\PageBanner;
use Illuminate\Http\Request;

class PageBannerController extends Controller
{
    public function index()
    {
        $banners = PageBanner::all();
        return view('backend.page_banners.index', compact('banners'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'banners' => 'nullable|array',
            'banners.*.id' => 'nullable|integer',
            'banners.*.page_name' => 'required|string',
            'banners.*.title' => 'nullable|string',
            'banners.*.image' => 'nullable|image|max:5120',
        ]);

        $submittedIds = [];

        if ($request->has('banners')) {
            foreach ($request->banners as $idx => $bannerData) {
                if (empty($bannerData['page_name'])) continue;

                $banner = isset($bannerData['id']) && !empty($bannerData['id'])
                    ? PageBanner::find($bannerData['id'])
                    : new PageBanner();

                if (!$banner) {
                    $banner = new PageBanner();
                }

                $banner->page_name = $bannerData['page_name'];
                $banner->title = $bannerData['title'] ?? null;

                if ($request->hasFile("banners.{$idx}.image")) {
                    if ($banner->image) {
                        \Illuminate\Support\Facades\Storage::disk('public')->delete($banner->image);
                    }
                    $path = $request->file("banners.{$idx}.image")->store('page_banners', 'public');
                    $banner->image = $path;
                }

                $banner->save();
                $submittedIds[] = $banner->id;
            }
        }

        // Delete any banners not in the submitted list
        $bannersToDelete = PageBanner::whereNotIn('id', $submittedIds)->get();
        foreach ($bannersToDelete as $delBanner) {
            if ($delBanner->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($delBanner->image);
            }
            $delBanner->delete();
        }

        return redirect()->back()->with('success', 'Page Banners updated successfully!');
    }
}
