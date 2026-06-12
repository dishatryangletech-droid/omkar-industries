<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageResolver extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ?string $slug = null)
    {
        if (!$slug) {
            abort(404);
        }

        $page = Page::where('slug', $slug)
            ->where('status', 'Active')
            ->first();

        if (!$page) {
            abort(404);
        }

        return view('frontend.page', compact('page'));
    }
}
