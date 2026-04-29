<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PhaseSlider;
use App\Models\PhaseMentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhaseSliderController extends Controller
{
    public function index()
    {
        $slides = PhaseSlider::orderBy('sort_order', 'asc')->get();
        return view('admin.home.phase-slider.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.home.phase-slider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'link_url' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('phase_sliders', 'public');
        }

        PhaseSlider::create([
            'title' => $request->title,
            'link_url' => $request->link_url,
            'image' => $imagePath,
            'sort_order' => PhaseSlider::max('sort_order') + 1,
        ]);

        return redirect()->route('admin.home.sections.phase-slider.index')->with('success', 'Slide created successfully.');
    }

    public function edit(PhaseSlider $phaseSlider)
    {
        return view('admin.home.phase-slider.edit', compact('phaseSlider'));
    }

    public function update(Request $request, PhaseSlider $phaseSlider)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'link_url' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'link_url' => $request->link_url,
        ];

        if ($request->hasFile('image')) {
            if ($phaseSlider->image) {
                Storage::disk('public')->delete($phaseSlider->image);
            }
            $data['image'] = $request->file('image')->store('phase_sliders', 'public');
        }

        $phaseSlider->update($data);

        return redirect()->route('admin.home.sections.phase-slider.index')->with('success', 'Slide updated successfully.');
    }

    public function destroy(PhaseSlider $phaseSlider)
    {
        if ($phaseSlider->image) {
            Storage::disk('public')->delete($phaseSlider->image);
        }
        $phaseSlider->delete();
        return redirect()->route('admin.home.sections.phase-slider.index')->with('success', 'Slide deleted successfully.');
    }

    public function toggleStatus(PhaseSlider $phaseSlider)
    {
        $phaseSlider->update(['status' => !$phaseSlider->status]);
        return response()->json(['success' => true, 'status' => $phaseSlider->status]);
    }

    public function reorder(Request $request)
    {
        foreach ($request->order as $index => $id) {
            PhaseSlider::where('id', $id)->update(['sort_order' => $index]);
        }
        return response()->json(['success' => true]);
    }
}
