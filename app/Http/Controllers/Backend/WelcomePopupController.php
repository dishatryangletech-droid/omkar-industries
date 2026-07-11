<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\WelcomePopup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WelcomePopupController extends Controller
{
    public function index()
    {
        $popup = WelcomePopup::first();
        if (!$popup) {
            $popup = new WelcomePopup();
        }
        return view('backend.website-pages.welcome-popup', compact('popup'));
    }

    public function store(Request $request)
    {
        $popup = WelcomePopup::first();
        if (!$popup) {
            $popup = new WelcomePopup();
        }

        $data = $request->except(['_token', 'image']);
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('image')) {
            if ($popup->image && Storage::disk('public')->exists($popup->image)) {
                Storage::disk('public')->delete($popup->image);
            }
            $data['image'] = $request->file('image')->store('welcome_popup', 'public');
        }

        $popup->fill($data);
        $popup->save();

        return redirect()->route('admin.website-pages.welcome-popup')->with('success', 'Welcome Popup updated successfully!');
    }
}
