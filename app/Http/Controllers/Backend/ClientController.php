<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::orderBy('id', 'asc')->get();

        return view('backend.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'is_headquarter' => 'required|in:yes,no',
            'status' => 'required|in:Active,Inactive',
        ]);

        $iconPath = null;
        if ($request->hasFile('icon')) {
            $iconPath = $request->file('icon')->store('clients', 'public');
        }

        Client::create([
            'name' => $request->name,
            'icon' => $iconPath,
            'is_headquarter' => $request->is_headquarter,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.clients.index')->with('success', 'Client created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('backend.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'is_headquarter' => 'required|in:yes,no',
            'status' => 'required|in:Active,Inactive',
        ]);

        $iconPath = $client->icon;
        if ($request->hasFile('icon')) {
            if ($client->icon && Storage::disk('public')->exists($client->icon)) {
                Storage::disk('public')->delete($client->icon);
            }
            $iconPath = $request->file('icon')->store('clients', 'public');
        }

        $client->update([
            'name' => $request->name,
            'icon' => $iconPath,
            'is_headquarter' => $request->is_headquarter,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.clients.index')->with('success', 'Client updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        if ($client->icon && Storage::disk('public')->exists($client->icon)) {
            Storage::disk('public')->delete($client->icon);
        }

        $client->delete();

        return redirect()->route('admin.clients.index')->with('success', 'Client deleted successfully.');
    }
}
