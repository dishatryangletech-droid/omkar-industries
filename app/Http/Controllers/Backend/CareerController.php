<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $careers = Career::latest()->get();

        return view('backend.careers.index', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.careers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'job_type' => 'required|string|max:255',
            'status' => 'required|in:Active,Inactive',
        ]);

        $data = $request->all();
        // requirements is an array from the form
        $data['requirements'] = $request->requirements ? array_filter($request->requirements) : [];

        Career::create($data);

        return redirect()->route('backend.careers.index')->with('success', 'Job opening created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Career $career)
    {
        return view('backend.careers.edit', compact('career'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Career $career)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'job_type' => 'required|string|max:255',
            'status' => 'required|in:Active,Inactive',
        ]);

        $data = $request->all();
        $data['requirements'] = $request->requirements ? array_filter($request->requirements) : [];

        $career->update($data);

        return redirect()->route('backend.careers.index')->with('success', 'Job opening updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Career $career)
    {
        $career->delete();

        return redirect()->route('backend.careers.index')->with('success', 'Job opening deleted successfully.');
    }
}
