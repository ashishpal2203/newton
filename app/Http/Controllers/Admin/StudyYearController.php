<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudyLanguage;
use App\Models\StudyYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudyYearController extends Controller
{
    public function index(Request $request)
    {
        $language_id = $request->query('language_id');
        if (!$language_id) {
            return redirect()->route('admin.study-classes.index')->with('error', 'Please navigate through a class and language first.');
        }

        $studyLanguage = StudyLanguage::findOrFail($language_id);
        $years = StudyYear::where('study_language_id', $language_id)->withCount('papers')->get();

        return view('admin.study.years.index', compact('years', 'studyLanguage'));
    }

    public function create(Request $request)
    {
        $language_id = $request->query('language_id');
        if (!$language_id) {
            return redirect()->route('admin.study-classes.index')->with('error', 'Please navigate through a class and language first.');
        }

        $studyLanguage = StudyLanguage::findOrFail($language_id);
        return view('admin.study.years.create', compact('studyLanguage'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'study_language_id' => 'required|exists:study_languages,id',
            'year' => 'required|string|max:255',
        ]);

        StudyYear::create($request->only(['study_language_id', 'year']));

        return redirect()->route('admin.study-years.index', ['language_id' => $request->study_language_id])
            ->with('success', 'Year added successfully.');
    }

    public function edit(StudyYear $studyYear)
    {
        return view('admin.study.years.edit', compact('studyYear'));
    }

    public function update(Request $request, StudyYear $studyYear)
    {
        $request->validate([
            'year' => 'required|string|max:255',
        ]);

        $studyYear->update($request->only('year'));

        return redirect()->route('admin.study-years.index', ['language_id' => $studyYear->study_language_id])
            ->with('success', 'Year updated successfully.');
    }

    public function destroy(StudyYear $studyYear)
    {
        $language_id = $studyYear->study_language_id;

        // Cascade delete files manually
        foreach($studyYear->papers as $paper) {
            if ($paper->file_path) Storage::disk('public')->delete($paper->file_path);
        }
        
        $studyYear->delete();

        return redirect()->route('admin.study-years.index', ['language_id' => $language_id])
            ->with('success', 'Year and all its question papers deleted.');
    }
}
