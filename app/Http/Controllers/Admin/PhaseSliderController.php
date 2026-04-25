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
        $slides = PhaseSlider::with('mentors')->orderBy('sort_order', 'asc')->get();
        return view('admin.home.phase-slider.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.home.phase-slider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'badge' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'link_text' => 'nullable|string|max:255',
            'link_url' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'button_url' => 'nullable|string|max:255',
            'mentor_names' => 'required|array|min:1',
            'mentor_titles' => 'required|array|min:1',
            'mentor_images' => 'required|array|min:1',
            'mentor_images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $slide = PhaseSlider::create([
            'badge' => $request->badge,
            'title' => $request->title,
            'link_text' => $request->link_text,
            'link_url' => $request->link_url,
            'description' => $request->description,
            'button_text' => $request->button_text ?? 'Join Now',
            'button_url' => $request->button_url,
            'sort_order' => PhaseSlider::max('sort_order') + 1,
        ]);

        if ($request->hasFile('mentor_images')) {
            foreach ($request->mentor_names as $index => $name) {
                if (isset($request->file('mentor_images')[$index])) {
                    $imagePath = $request->file('mentor_images')[$index]->store('mentors', 'public');
                    $slide->mentors()->create([
                        'name' => $name,
                        'title' => $request->mentor_titles[$index],
                        'image' => $imagePath,
                        'sort_order' => $index
                    ]);
                }
            }
        }

        return redirect()->route('admin.home.sections.phase-slider.index')->with('success', 'Slide created successfully.');
    }

    public function edit(PhaseSlider $phaseSlider)
    {
        return view('admin.home.phase-slider.edit', compact('phaseSlider'));
    }

    public function update(Request $request, PhaseSlider $phaseSlider)
    {
        $request->validate([
            'badge' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'link_text' => 'nullable|string|max:255',
            'link_url' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'button_url' => 'nullable|string|max:255',
            'mentor_names' => 'required|array|min:1',
            'mentor_titles' => 'required|array|min:1',
            'mentor_images' => 'nullable|array',
            'mentor_images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $phaseSlider->update([
            'badge' => $request->badge,
            'title' => $request->title,
            'link_text' => $request->link_text,
            'link_url' => $request->link_url,
            'description' => $request->description,
            'button_text' => $request->button_text ?? 'Join Now',
            'button_url' => $request->button_url,
        ]);

        $mentorIds = $request->mentor_ids ?? [];
        $existingMentors = $phaseSlider->mentors()->pluck('id')->toArray();
        $toDelete = array_diff($existingMentors, array_filter($mentorIds));
        
        foreach($toDelete as $id) {
            $m = PhaseMentor::find($id);
            if($m && $m->image) Storage::disk('public')->delete($m->image);
            if($m) $m->delete();
        }

        foreach ($request->mentor_names as $index => $name) {
            if (empty($name)) continue;

            $data = [
                'name' => $name,
                'title' => $request->mentor_titles[$index],
                'sort_order' => $index,
            ];

            if (isset($request->file('mentor_images')[$index])) {
                $imagePath = $request->file('mentor_images')[$index]->store('mentors', 'public');
                $data['image'] = $imagePath;
            }

            if (isset($mentorIds[$index]) && !empty($mentorIds[$index])) {
                $mentor = PhaseMentor::find($mentorIds[$index]);
                if (isset($data['image']) && $mentor->image) {
                    Storage::disk('public')->delete($mentor->image);
                }
                $mentor->update($data);
            } else {
                $phaseSlider->mentors()->create($data);
            }
        }

        return redirect()->route('admin.home.sections.phase-slider.index')->with('success', 'Slide updated successfully.');
    }

    public function destroy(PhaseSlider $phaseSlider)
    {
        foreach ($phaseSlider->mentors as $mentor) {
            if ($mentor->image) Storage::disk('public')->delete($mentor->image);
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
