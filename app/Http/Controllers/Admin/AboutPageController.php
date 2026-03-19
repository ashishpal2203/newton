<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContentBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AboutPageController extends Controller
{
    public function index()
    {
        $content = ContentBlock::where('page_name', 'about')->pluck('value', 'key')->toArray();
        return view('admin.content.about', compact('content'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|array',
            'content.*' => 'nullable|string'
        ]);

        foreach ($validated['content'] as $key => $value) {
            ContentBlock::updateOrCreate(
                ['page_name' => 'about', 'key' => $key],
                ['value' => $value ?? '', 'type' => 'text']
            );
        }

        // Clear the cache for the about page
        Cache::forget('content_blocks_about');

        return redirect()->back()->with('success', 'About page content updated successfully.');
    }
}
