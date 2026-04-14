<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudyClass;
use App\Models\StudyYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudyYearController extends Controller
{
    public function index(Request $request)
    {
        $class_id = $request->query('class_id');
        if (!$class_id) {
            return redirect()->route('admin.study-classes.index')->with('error', 'Please navigate through a class first.');
        }

        $studyClass = StudyClass::findOrFail($class_id);
        $years = StudyYear::where('study_class_id', $class_id)->withCount('studyPapers')->get();

        return view('admin.study.years.index', compact('years', 'studyClass'));
    }

    public function create(Request $request)
    {
        $class_id = $request->query('class_id');
        if (!$class_id) {
            return redirect()->route('admin.study-classes.index')->with('error', 'Please navigate through a class first.');
        }

        $studyClass = StudyClass::findOrFail($class_id);
        return view('admin.study.years.create', compact('studyClass'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'study_class_id' => 'required|exists:study_classes,id',
            'year' => 'required|string|max:255',
        ]);

        StudyYear::create($request->only(['study_class_id', 'year']));

        return redirect()->route('admin.study-years.index', ['class_id' => $request->study_class_id])
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

        return redirect()->route('admin.study-years.index', ['class_id' => $studyYear->study_class_id])
            ->with('success', 'Year updated successfully.');
    }

    public function destroy(StudyYear $studyYear)
    {
        $class_id = $studyYear->study_class_id;

        // Cascade delete files manually
        foreach($studyYear->studyPapers as $paper) {
            if ($paper->file_path) Storage::disk('public')->delete($paper->file_path);
        }
        
        $studyYear->delete();

        return redirect()->route('admin.study-years.index', ['class_id' => $class_id])
            ->with('success', 'Year and all its question papers deleted.');
    }
}
