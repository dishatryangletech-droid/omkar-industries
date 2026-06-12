<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class HomePageController extends Controller
{
    public function index(): View
    {
        $homePage = HomePage::firstOrCreate(
            ['section_type' => 'brochure_page'],
            [
                'title' => 'Brochure Page Settings',
                'btn_title' => 'Download Brochure',
            ]
        );

        return view('backend.website-pages.brochure-page', compact('homePage'));
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'btn_title' => 'nullable|string|max:255',
            'brochure_pdf' => 'nullable|file|mimes:pdf|max:10240', // 10MB max
            'btn_link' => 'nullable|string|max:255',
        ]);

        $homePage = HomePage::firstOrCreate(['section_type' => 'brochure_page']);

        $data = $request->only(['btn_title', 'btn_link']);

        if ($request->hasFile('brochure_pdf')) {
            // Delete old file if exists
            if ($homePage->brochure_pdf && Storage::disk('public')->exists($homePage->brochure_pdf)) {
                Storage::disk('public')->delete($homePage->brochure_pdf);
            }

            $file = $request->file('brochure_pdf');
            $filename = 'brochure_'.time().'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('brochures', $filename, 'public');
            $data['brochure_pdf'] = $path;
        }

        $homePage->update($data);

        return redirect()->route('backend.website-pages.brochure-page.index')
            ->with('success', 'Brochure Page Settings updated successfully.');
    }
}
