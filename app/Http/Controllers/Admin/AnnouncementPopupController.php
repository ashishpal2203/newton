<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnnouncementPopup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnnouncementPopupController extends Controller
{
    public function index()
    {
        $popups = AnnouncementPopup::latest()->get();
        return view('admin.popups.index', compact('popups'));
    }

    public function create()
    {
        return view('admin.popups.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'redirect_url' => 'nullable|url|max:255',
            'trigger_type' => 'required|in:delay,scroll',
            'trigger_value' => 'required|integer|min:0',
        ]);

        $imagePath = $request->file('image')->store('popups', 'public');

        AnnouncementPopup::create([
            'title' => $request->title,
            'image_path' => $imagePath,
            'redirect_url' => $request->redirect_url,
            'trigger_type' => $request->trigger_type,
            'trigger_value' => $request->trigger_value,
            'is_active' => false,
        ]);

        return redirect()->route('admin.popups.index')->with('success', 'Announcement Popup created successfully.');
    }

    public function edit(AnnouncementPopup $popup)
    {
        return view('admin.popups.edit', compact('popup'));
    }

    public function update(Request $request, AnnouncementPopup $popup)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'redirect_url' => 'nullable|url|max:255',
            'trigger_type' => 'required|in:delay,scroll',
            'trigger_value' => 'required|integer|min:0',
        ]);

        $data = $request->only(['title', 'redirect_url', 'trigger_type', 'trigger_value']);

        if ($request->hasFile('image')) {
            if ($popup->image_path) {
                Storage::disk('public')->delete($popup->image_path);
            }
            $data['image_path'] = $request->file('image')->store('popups', 'public');
        }

        $popup->update($data);

        return redirect()->route('admin.popups.index')->with('success', 'Announcement Popup updated successfully.');
    }

    public function destroy(AnnouncementPopup $popup)
    {
        if ($popup->image_path) {
            Storage::disk('public')->delete($popup->image_path);
        }
        $popup->delete();

        return redirect()->route('admin.popups.index')->with('success', 'Announcement Popup deleted successfully.');
    }

    public function toggleStatus(AnnouncementPopup $popup)
    {
        // Deactivate all others first to ensure only one is active at a time
        if (!$popup->is_active) {
            AnnouncementPopup::where('id', '!=', $popup->id)->update(['is_active' => false]);
        }
        
        $popup->update(['is_active' => !$popup->is_active]);
        
        return response()->json([
            'success' => true,
            'status' => $popup->is_active,
            'message' => 'Status updated successfully.'
        ]);
    }
}
