<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContentBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomePageController extends Controller
{
    public function index()
    {
        $blocks = ContentBlock::where('page_name', 'home')->get();
        $content = [];
        foreach ($blocks as $block) {
            $content[$block->key] = $block->value;
        }
        return view('admin.content.home', compact('content'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|array',
            'content.*' => 'nullable|string',
            'banners' => 'nullable|array',
            'banners.laptop' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'banners.mobile' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        // Handle text content
        if (isset($validated['content'])) {
            foreach ($validated['content'] as $key => $value) {
                ContentBlock::updateOrCreate(
                    ['page_name' => 'home', 'key' => $key],
                    ['value' => $value ?? '', 'type' => 'text']
                );
            }
        }

        // Handle banner images (Legacy specific handling for Phase 3)
        if ($request->hasFile('banners')) {
            foreach ($request->file('banners') as $key => $file) {
                $path = $file->store('banners', 'public');
                ContentBlock::updateOrCreate(
                    ['page_name' => 'home', 'key' => 'home_hero_banner_' . $key],
                    ['value' => $path, 'type' => 'image']
                );
            }
        }

        // Handle Collections (Repeaters)
        if ($request->has('collections')) {
            $collections = $request->input('collections');
            
            // Handle files inside collections (look for fields ending in _file)
            if ($request->hasFile('collections_files')) {
                $files = $request->file('collections_files');
                foreach ($files as $collectionKey => $items) {
                    foreach ($items as $index => $fields) {
                        foreach ($fields as $fieldName => $file) {
                            $path = $file->store('collections', 'public');
                            // Map icon_file to icon, image_file to image, etc.
                            $baseName = str_replace('_file', '', $fieldName);
                            $collections[$collectionKey][$index][$baseName] = $path;
                        }
                    }
                }
            }

            foreach ($collections as $key => $data) {
                // To prevent losing old images in a repeater when not re-uploading, 
                // we should merge with existing data if needed, but for now we'll 
                // assume hidden inputs hold the existing paths.
                ContentBlock::updateOrCreate(
                    ['page_name' => 'home', 'key' => $key],
                    ['value' => json_encode($data), 'type' => 'collection']
                );
            }
        }

        // Clear the cache for the home page
        Cache::forget('cb_home');

        return redirect()->back()->with('success', 'Home page content updated successfully.');
    }
}
