<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::orderBy('sort_order', 'asc')->get();
        return view('admin.reviews.index', compact('reviews'));
    }

    public function create()
    {
        return view('admin.reviews.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'user_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string',
        ]);

        $data = $request->except('user_image');
        $data['status'] = true;
        $data['sort_order'] = Review::max('sort_order') + 1;

        if ($request->hasFile('user_image')) {
            $data['user_image'] = $request->file('user_image')->store('reviews', 'public');
        }

        Review::create($data);

        return redirect()->route('admin.reviews.index')->with('success', 'Review added successfully.');
    }

    public function edit(Review $review)
    {
        return view('admin.reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'user_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string',
        ]);

        $data = $request->except('user_image');

        if ($request->hasFile('user_image')) {
            if ($review->user_image) Storage::disk('public')->delete($review->user_image);
            $data['user_image'] = $request->file('user_image')->store('reviews', 'public');
        }

        $review->update($data);

        return redirect()->route('admin.reviews.index')->with('success', 'Review updated successfully.');
    }

    public function destroy(Review $review)
    {
        if ($review->user_image) Storage::disk('public')->delete($review->user_image);
        $review->delete();

        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully.');
    }

    public function toggleStatus(Review $review)
    {
        $review->update(['status' => !$review->status]);
        return response()->json(['success' => true, 'status' => $review->status]);
    }

    public function reorder(Request $request)
    {
        $request->validate([
            'order' => 'required|array',
            'order.*' => 'integer|exists:reviews,id',
        ]);

        foreach ($request->order as $index => $id) {
            Review::where('id', $id)->update(['sort_order' => $index]);
        }

        return response()->json(['success' => true]);
    }

    public function storeFrontend(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string',
        ]);

        $data = $request->only(['user_name', 'subtitle', 'rating', 'content']);
        $data['status'] = false; // Pending approval
        $data['sort_order'] = Review::max('sort_order') + 1;

        Review::create($data);

        return redirect()->back()->with('success', 'Thank you! Your review has been submitted and is pending approval.');
    }
}
