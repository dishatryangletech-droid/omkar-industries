<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DealerInquiry;

class DealerInquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inquiries = DealerInquiry::latest()->get();

        return view('backend.dealers.index', compact('inquiries'));
    }

    /**
     * Display the specified resource.
     */
    public function show(DealerInquiry $dealer)
    {
        if ($dealer->status === 'New') {
            $dealer->update(['status' => 'Read']);
        }

        return view('backend.dealers.show', ['dealerInquiry' => $dealer]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DealerInquiry $dealer)
    {
        $dealer->delete();

        return redirect()->route('backend.dealers.index')->with('success', 'Inquiry deleted successfully.');
    }
}
