<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CountryContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CountryContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = CountryContact::orderBy('sort_order', 'asc')->latest()->get();

        return view('backend.website-pages.country-contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.website-pages.country-contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'country_name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'status' => 'required|in:Active,Inactive',
            'sort_order' => 'nullable|integer',
        ]);

        $data = $request->except(['_token', '_method']);
        $data['sort_order'] = $data['sort_order'] ?? 0;

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('country_contacts', 'public');
        }

        CountryContact::create($data);

        return redirect()->route('admin.website-pages.country-contacts.index')
            ->with('success', 'Country contact added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CountryContact $countryContact)
    {
        return view('backend.website-pages.country-contacts.edit', compact('countryContact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CountryContact $countryContact)
    {
        $request->validate([
            'country_name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'status' => 'required|in:Active,Inactive',
            'sort_order' => 'nullable|integer',
        ]);

        $data = $request->except(['_token', '_method']);
        $data['sort_order'] = $data['sort_order'] ?? 0;

        if ($request->hasFile('logo')) {
            if ($countryContact->logo && Storage::disk('public')->exists($countryContact->logo)) {
                Storage::disk('public')->delete($countryContact->logo);
            }
            $data['logo'] = $request->file('logo')->store('country_contacts', 'public');
        }

        $countryContact->update($data);

        return redirect()->route('admin.website-pages.country-contacts.index')
            ->with('success', 'Country contact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CountryContact $countryContact)
    {
        if ($countryContact->logo && Storage::disk('public')->exists($countryContact->logo)) {
            Storage::disk('public')->delete($countryContact->logo);
        }

        $countryContact->delete();

        return redirect()->route('admin.website-pages.country-contacts.index')
            ->with('success', 'Country contact deleted successfully.');
    }
}
