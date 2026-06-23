<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = JobApplication::with('career')->latest()->get();

        return view('backend.job-applications.index', compact('applications'));
    }

    /**
     * Display the specified resource.
     */
    public function show(JobApplication $jobApplication)
    {
        if ($jobApplication->status === 'New') {
            $jobApplication->update(['status' => 'Reviewed']);
        }

        return view('backend.job-applications.show', compact('jobApplication'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobApplication $jobApplication)
    {
        if ($jobApplication->resume) {
            Storage::disk('public')->delete($jobApplication->resume);
        }

        $jobApplication->delete();

        return redirect()->route('admin.job-applications.index')->with('success', 'Application deleted successfully.');
    }
}
