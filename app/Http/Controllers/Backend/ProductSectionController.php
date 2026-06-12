<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductSectionController extends Controller
{
    public function index()
    {
        $content = HomePage::where('section_type', 'product_section')->first() ?? new HomePage;
        $products = Product::where(function($q) {
            $q->whereNull('parent_id')
              ->orWhere('parent_id', 0)
              ->orWhere('parent_id', '');
        })->where('status', 'Active')->get();

        return view('backend.website-pages.product-section.index', compact('content', 'products'));
    }

    public function update(Request $request)
    {
        $content = HomePage::where('section_type', 'product_section')->first() ?? new HomePage;

        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $data = [
            'section_type' => 'product_section',
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'subtitle_text1' => $request->product_id1,
            'subtitle_text2' => $request->product_id2,
            'subtitle_text3' => $request->product_id3,
            'subtitle_text4' => $request->product_id4,
            'subtitle_text5' => $request->product_id5,
            'subtitle_text6' => $request->product_id6,
            'subtitle_text7' => $request->product_id7,
            'subtitle_text8' => $request->product_id8,
            'subtitle_text9' => $request->product_id9,
            'status' => 'Active',
        ];

        if ($content->exists) {
            $content->update($data);
        } else {
            HomePage::create($data);
        }

        return redirect()->back()->with('success', 'Product section updated successfully.');
    }
}
