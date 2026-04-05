<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudyClass;
use App\Models\StudyLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudyLanguageController extends Controller
{
    public function index(Request $request)
    {
        $class_id = $request->query('class_id');
        if (!$class_id) {
            return redirect()->route('admin.study-classes.index')->with('error', 'Please select a Class first.');
        }

        $studyClass = StudyClass::findOrFail($class_id);
        $languages = StudyLanguage::where('study_class_id', $class_id)->withCount('studyYears')->get();

        return view('admin.study.languages.index', compact('languages', 'studyClass'));
    }

    public function create(Request $request)
    {
        $class_id = $request->query('class_id');
        if (!$class_id) {
            return redirect()->route('admin.study-classes.index')->with('error', 'Please select a Class first.');
        }

        $studyClass = StudyClass::findOrFail($class_id);
        return view('admin.study.languages.create', compact('studyClass'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'study_class_id' => 'required|exists:study_classes,id',
            'name' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
        ]);

        $data = $request->only(['study_class_id', 'name']);
        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('study/icons', 'public');
        }

        StudyLanguage::create($data);

        return redirect()->route('admin.study-languages.index', ['class_id' => $request->study_class_id])
            ->with('success', 'Language added successfully.');
    }

    public function edit(StudyLanguage $studyLanguage)
    {
        return view('admin.study.languages.edit', compact('studyLanguage'));
    }

    public function update(Request $request, StudyLanguage $studyLanguage)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
        ]);

        $data = $request->only('name');
        if ($request->hasFile('icon')) {
            if ($studyLanguage->icon) Storage::disk('public')->delete($studyLanguage->icon);
            $data['icon'] = $request->file('icon')->store('study/icons', 'public');
        }

        $studyLanguage->update($data);

        return redirect()->route('admin.study-languages.index', ['class_id' => $studyLanguage->study_class_id])
            ->with('success', 'Language updated successfully.');
    }

    public function destroy(StudyLanguage $studyLanguage)
    {
        $class_id = $studyLanguage->study_class_id;

        // Cascade delete files manually
        foreach($studyLanguage->studyYears as $year) {
            foreach($year->studyPapers as $paper) {
                if ($paper->file_path) Storage::disk('public')->delete($paper->file_path);
            }
        }
        
        if ($studyLanguage->icon) Storage::disk('public')->delete($studyLanguage->icon);
        $studyLanguage->delete();

        return redirect()->route('admin.study-languages.index', ['class_id' => $class_id])
            ->with('success', 'Language and all its nested materials deleted.');
    }
}
