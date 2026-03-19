<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    public function index()
    {
        $mediaFiles = Media::latest()->paginate(24);
        return view('admin.media.index', compact('mediaFiles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'files.*' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx,zip|max:10000',
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                // Generate a safe unique name
                $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
                
                // Store in storage/app/public/media
                $path = $file->storeAs('media', $filename, 'public');

                Media::create([
                    'file_name' => $file->getClientOriginalName(),
                    'file_path' => '/storage/' . $path, // Public accessible path
                    'mime_type' => $file->getClientMimeType(),
                ]);
            }

            return redirect()->route('admin.media.index')->with('success', 'Media uploaded successfully.');
        }

        return redirect()->back()->with('error', 'No files uploaded.');
    }

    public function destroy(Media $media)
    {
        // Path starts with /storage/media/..., we need the relative path inside public disk: media/...
        $relativePath = str_replace('/storage/', '', $media->file_path);
        
        if (Storage::disk('public')->exists($relativePath)) {
            Storage::disk('public')->delete($relativePath);
        }

        $media->delete();
        return redirect()->route('admin.media.index')->with('success', 'Media deleted successfully.');
    }
}
