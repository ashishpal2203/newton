<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudyYear;
use App\Models\StudyPaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudyPaperController extends Controller
{
    public function index(Request $request)
    {
        $year_id = $request->query('year_id');
        if (!$year_id) {
            return redirect()->route('admin.study-classes.index')->with('error', 'Please navigate through a class and year first.');
        }

        $studyYear = StudyYear::findOrFail($year_id);
        $papers = StudyPaper::where('study_year_id', $year_id)->get();

        return view('admin.study.papers.index', compact('papers', 'studyYear'));
    }

    public function create(Request $request)
    {
        $year_id = $request->query('year_id');
        if (!$year_id) {
            return redirect()->route('admin.study-classes.index')->with('error', 'Please navigate through a year first.');
        }

        $studyYear = StudyYear::findOrFail($year_id);
        return view('admin.study.papers.create', compact('studyYear'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'study_year_id' => 'required|exists:study_years,id',
            'title' => 'nullable|string|max:255',
            'files' => 'required|array',
            'files.*' => 'required|file|mimes:pdf|max:10240', // 10MB Max per file
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $index => $file) {
                $path = $file->store('study/papers', 'public');
                
                // If title is skipped, use the original PDF filename. 
                // If title is provided and multiple files uploaded, suffix them (Title 1, Title 2...)
                $baseName = $file->getClientOriginalName();
                $generatedTitle = $request->title ? ($request->title . (count($request->file('files')) > 1 ? ' ' . ($index + 1) : '')) : $baseName;
                
                StudyPaper::create([
                    'study_year_id' => $request->study_year_id,
                    'title' => $generatedTitle,
                    'file_path' => $path,
                    'status' => true,
                ]);
            }
        }

        return redirect()->route('admin.study-papers.index', ['year_id' => $request->study_year_id])
            ->with('success', 'Question Paper(s) uploaded successfully.');
    }

    public function edit(StudyPaper $studyPaper)
    {
        return view('admin.study.papers.edit', compact('studyPaper'));
    }

    public function update(Request $request, StudyPaper $studyPaper)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        $data = $request->only('title');

        if ($request->hasFile('file')) {
            if ($studyPaper->file_path) Storage::disk('public')->delete($studyPaper->file_path);
            $data['file_path'] = $request->file('file')->store('study/papers', 'public');
        }

        $studyPaper->update($data);

        return redirect()->route('admin.study-papers.index', ['year_id' => $studyPaper->study_year_id])
            ->with('success', 'Question Paper updated successfully.');
    }

    public function destroy(StudyPaper $studyPaper)
    {
        $year_id = $studyPaper->study_year_id;

        if ($studyPaper->file_path) Storage::disk('public')->delete($studyPaper->file_path);
        
        $studyPaper->delete();

        return redirect()->route('admin.study-papers.index', ['year_id' => $year_id])
            ->with('success', 'Question Paper deleted successfully.');
    }
}
