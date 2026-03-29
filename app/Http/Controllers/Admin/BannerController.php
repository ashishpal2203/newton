<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('sort_order', 'asc')->get();
        return view('admin.home.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.home.banner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'desktop_images' => 'required|array',
            'desktop_images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'mobile_images' => 'nullable|array',
            'mobile_images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'title' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('desktop_images')) {
            $mobileImages = $request->file('mobile_images') ?? [];
            foreach ($request->file('desktop_images') as $index => $desktopFile) {
                $desktopPath = $desktopFile->store('banners', 'public');
                
                $mobilePath = null;
                if (isset($mobileImages[$index])) {
                    $mobilePath = $mobileImages[$index]->store('banners', 'public');
                }

                Banner::create([
                    'title' => $request->title,
                    'link' => $request->link,
                    'desktop_image' => $desktopPath,
                    'mobile_image' => $mobilePath,
                    'status' => true,
                    'sort_order' => Banner::max('sort_order') + 1,
                ]);
            }
        }

        return redirect()->route('admin.home.sections.banner.index')->with('success', 'Banners uploaded successfully.');
    }

    public function edit(Banner $banner)
    {
        return view('admin.home.banner.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'desktop_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'mobile_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'title' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:255',
        ]);

        $data = $request->only(['title', 'link']);

        if ($request->hasFile('desktop_image')) {
            if ($banner->desktop_image) Storage::disk('public')->delete($banner->desktop_image);
            $data['desktop_image'] = $request->file('desktop_image')->store('banners', 'public');
        }

        if ($request->hasFile('mobile_image')) {
            if ($banner->mobile_image) Storage::disk('public')->delete($banner->mobile_image);
            $data['mobile_image'] = $request->file('mobile_image')->store('banners', 'public');
        }

        $banner->update($data);

        return redirect()->route('admin.home.sections.banner.index')->with('success', 'Banner updated successfully.');
    }

    public function destroy(Banner $banner)
    {
        if ($banner->desktop_image) Storage::disk('public')->delete($banner->desktop_image);
        if ($banner->mobile_image) Storage::disk('public')->delete($banner->mobile_image);
        
        $banner->delete();

        return redirect()->route('admin.home.sections.banner.index')->with('success', 'Banner deleted successfully.');
    }

    public function toggleStatus(Banner $banner)
    {
        $banner->update(['status' => !$banner->status]);
        return response()->json(['success' => true, 'status' => $banner->status]);
    }

    public function reorder(Request $request)
    {
        $request->validate([
            'order' => 'required|array',
            'order.*' => 'integer|exists:banners,id',
        ]);

        foreach ($request->order as $index => $id) {
            Banner::where('id', $id)->update(['sort_order' => $index]);
        }

        return response()->json(['success' => true]);
    }
}
