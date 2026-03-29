<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LatestUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LatestUpdateController extends Controller
{
    public function index()
    {
        $updates = LatestUpdate::orderBy('sort_order', 'asc')->get();
        return view('admin.latest_updates.index', compact('updates'));
    }

    public function create()
    {
        return view('admin.latest_updates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'link' => 'nullable|string|max:255',
            'published_date' => 'nullable|string|max:50',
            'read_time' => 'nullable|string|max:50',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('updates', 'public');
        }

        LatestUpdate::create([
            'title' => $request->title,
            'category' => $request->category,
            'image' => $imagePath,
            'link' => $request->link,
            'published_date' => $request->published_date,
            'read_time' => $request->read_time,
            'status' => true,
            'sort_order' => LatestUpdate::max('sort_order') + 1,
        ]);

        return redirect()->route('admin.latest-updates.index')->with('success', 'Latest Update created successfully.');
    }

    public function edit(LatestUpdate $latestUpdate)
    {
        return view('admin.latest_updates.edit', compact('latestUpdate'));
    }

    public function update(Request $request, LatestUpdate $latestUpdate)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'link' => 'nullable|string|max:255',
            'published_date' => 'nullable|string|max:50',
            'read_time' => 'nullable|string|max:50',
        ]);

        $data = $request->only(['title', 'category', 'link', 'published_date', 'read_time']);

        if ($request->hasFile('image')) {
            if ($latestUpdate->image) Storage::disk('public')->delete($latestUpdate->image);
            $data['image'] = $request->file('image')->store('updates', 'public');
        }

        $latestUpdate->update($data);

        return redirect()->route('admin.latest-updates.index')->with('success', 'Latest Update updated successfully.');
    }

    public function destroy(LatestUpdate $latestUpdate)
    {
        if ($latestUpdate->image) Storage::disk('public')->delete($latestUpdate->image);
        $latestUpdate->delete();

        return redirect()->route('admin.latest-updates.index')->with('success', 'Latest Update deleted successfully.');
    }

    public function toggleStatus(LatestUpdate $latestUpdate)
    {
        $latestUpdate->update(['status' => !$latestUpdate->status]);
        return response()->json(['success' => true, 'status' => $latestUpdate->status]);
    }

    public function reorder(Request $request)
    {
        $request->validate([
            'order' => 'required|array',
            'order.*' => 'integer|exists:latest_updates,id',
        ]);

        foreach ($request->order as $index => $id) {
            LatestUpdate::where('id', $id)->update(['sort_order' => $index]);
        }

        return response()->json(['success' => true]);
    }
}
