<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index()
    {
        $photos = Gallery::orderBy('sort_order')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.gallery.index', compact('photos'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120', // Up to 5MB per image
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $file) {
                // Generate unique filename
                $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
                
                // Store in public/gallery folder
                $path = $file->storeAs('gallery', $filename, 'public');

                Gallery::create([
                    'image_path' => $path,
                    'status' => true,
                    'sort_order' => 0
                ]);
            }

            return redirect()->route('admin.gallery.index')->with('success', 'Photos uploaded successfully.');
        }

        return redirect()->back()->with('error', 'Please select at least one photo.');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'status' => 'required|boolean',
            'sort_order' => 'required|integer',
        ]);

        $gallery->update($request->only(['title', 'status', 'sort_order']));

        return redirect()->route('admin.gallery.index')->with('success', 'Photo details updated.');
    }

    public function destroy(Gallery $gallery)
    {
        // Delete physical file
        if (Storage::disk('public')->exists($gallery->image_path)) {
            Storage::disk('public')->delete($gallery->image_path);
        }

        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Photo removed from gallery.');
    }
}
