<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function show($slug)
    {
        $page = Page::where('slug', $slug)
                    ->where('is_published', true)
                    ->firstOrFail();

        return view('pages.dynamic', compact('page'));
    }
}
