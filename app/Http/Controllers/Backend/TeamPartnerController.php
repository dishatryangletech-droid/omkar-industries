<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TeamPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamPartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type = $request->get('type', 'Member');
        $items = TeamPartner::where('type', $type)->latest()->get();

        return view('backend.website-pages.team-partners.index', compact('items', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $type = $request->get('type', 'Member');

        return view('backend.website-pages.team-partners.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:Member,Partner',
            'usage_type' => 'required|in:single,multiple',
            'name' => 'required|string|max:255',
            'designation_or_status' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'facebook_link' => 'nullable|url|max:255',
            'linkedin_link' => 'nullable|url|max:255',
            'instagram_link' => 'nullable|url|max:255',
            'link' => 'nullable|url|max:255',
            'status' => 'required|in:Active,Inactive',
        ]);

        $data = $request->except(['_token', '_method']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('team-partners', 'public');
        }

        TeamPartner::create($data);

        return redirect()->route('admin.website-pages.team-partners.index', ['type' => $request->type])
            ->with('success', $request->type.' added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeamPartner $teamPartner)
    {
        $type = $teamPartner->type;

        return view('backend.website-pages.team-partners.edit', compact('teamPartner', 'type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TeamPartner $teamPartner)
    {
        $request->validate([
            'usage_type' => 'required|in:single,multiple',
            'name' => 'required|string|max:255',
            'designation_or_status' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'facebook_link' => 'nullable|url|max:255',
            'linkedin_link' => 'nullable|url|max:255',
            'instagram_link' => 'nullable|url|max:255',
            'link' => 'nullable|url|max:255',
            'status' => 'required|in:Active,Inactive',
        ]);

        $data = $request->except(['_token', '_method']);

        if ($request->hasFile('image')) {
            if ($teamPartner->image) {
                Storage::disk('public')->delete($teamPartner->image);
            }
            $data['image'] = $request->file('image')->store('team-partners', 'public');
        }

        $teamPartner->update($data);

        return redirect()->route('admin.website-pages.team-partners.index', ['type' => $teamPartner->type])
            ->with('success', $teamPartner->type.' updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamPartner $teamPartner)
    {
        $type = $teamPartner->type;
        if ($teamPartner->image) {
            Storage::disk('public')->delete($teamPartner->image);
        }

        $teamPartner->delete();

        return redirect()->route('admin.website-pages.team-partners.index', ['type' => $type])
            ->with('success', $type.' deleted successfully.');
    }
}
