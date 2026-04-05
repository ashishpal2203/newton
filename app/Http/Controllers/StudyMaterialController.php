<?php

namespace App\Http\Controllers;

use App\Models\StudyClass;
use App\Models\StudyLanguage;
use App\Models\StudyYear;
use Illuminate\Http\Request;

class StudyMaterialController extends Controller
{
    public function index()
    {
        $classes = StudyClass::where('status', true)->get();
        return view('pages.study-materials.index', compact('classes'));
    }

    public function showLanguages(StudyClass $class)
    {
        $languages = $class->languages()->where('status', true)->get();
        return view('pages.study-materials.languages', compact('class', 'languages'));
    }

    public function showYears(StudyClass $class, StudyLanguage $language)
    {
        $years = $language->studyYears()->where('status', true)->orderBy('year', 'desc')->get();
        return view('pages.study-materials.years', compact('class', 'language', 'years'));
    }

    public function showPapers(StudyClass $class, StudyLanguage $language, StudyYear $studyYear)
    {
        $papers = $studyYear->studyPapers()->where('status', true)->get();
        return view('pages.study-materials.papers', compact('class', 'language', 'studyYear', 'papers'));
    }
}
