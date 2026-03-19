<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::where('is_featured', true)->get();
        return view('pages.home', compact('courses'));
    }

    public function courses()
    {
        $courses = Course::all();
        return view('pages.courses', compact('courses'));
    }
}
