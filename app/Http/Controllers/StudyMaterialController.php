<?php

namespace App\Http\Controllers;

use App\Models\StudyClass;
use App\Models\StudyYear;
use Illuminate\Http\Request;

class StudyMaterialController extends Controller
{
    public function index()
    {
        $classes = StudyClass::where('status', true)->get();
        return view('pages.study-materials.index', compact('classes'));
    }

    public function showYears(StudyClass $class)
    {
        $years = $class->studyYears()->where('status', true)->orderBy('year', 'desc')->get();
        return view('pages.study-materials.years', compact('class', 'years'));
    }

    public function showPapers(StudyClass $class, StudyYear $studyYear)
    {
        $papers = $studyYear->studyPapers()->where('status', true)->get();
        return view('pages.study-materials.papers', compact('class', 'studyYear', 'papers'));
    }
}
