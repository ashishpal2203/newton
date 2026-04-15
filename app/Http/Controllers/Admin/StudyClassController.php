<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudyClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudyClassController extends Controller
{
    public function index()
    {
        $classes = StudyClass::withCount('studyYears')->get();

        return view('admin.study.classes.index', compact('classes'));
    }

    public function create()
    {
        return view('admin.study.classes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
        ]);

        $data = $request->only('name');
        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('study/icons', 'public');
        }

        StudyClass::create($data);

        return redirect()->route('admin.study-classes.index')->with('success', 'Class created successfully');
    }

    public function edit(StudyClass $studyClass)
    {
        return view('admin.study.classes.edit', compact('studyClass'));
    }

    public function update(Request $request, StudyClass $studyClass)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
        ]);

        $data = $request->only('name');
        if ($request->hasFile('icon')) {
            if ($studyClass->icon) {
                Storage::disk('public')->delete($studyClass->icon);
            }
            $data['icon'] = $request->file('icon')->store('study/icons', 'public');
        }

        $studyClass->update($data);

        return redirect()->route('admin.study-classes.index')->with('success', 'Class updated successfully');
    }

    public function destroy(StudyClass $studyClass)
    {
        // Delete all nested files manually before table cascade deletes row.
        foreach ($studyClass->studyYears as $year) {
            foreach ($year->studyPapers as $paper) {
                if ($paper->file_path) {
                    Storage::disk('public')->delete($paper->file_path);
                }
            }
        }

        if ($studyClass->icon) {
            Storage::disk('public')->delete($studyClass->icon);
        }
        $studyClass->delete();

        return redirect()->route('admin.study-classes.index')->with('success', 'Class and all nested study materials deleted.');
    }
}
