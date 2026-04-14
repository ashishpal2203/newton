<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $photos = Gallery::where('status', true)
            ->orderBy('sort_order')
            ->orderBy('created_at', 'desc')
            ->paginate(24);

        return view('pages.gallery', compact('photos'));
    }
}
