<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $contacts = Contact::latest()->get();

        return view('backend.contacts.index', compact('contacts'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact): View
    {
        if ($contact->status === 'New') {
            $contact->update(['status' => 'Read']);
        }

        return view('backend.contacts.show', compact('contact'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')->with('success', 'Contact inquiry deleted successfully.');
    }
}
