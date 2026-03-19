<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;

class CourseController extends Controller
{
    public function show($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        return view('pages.course_detail', compact('course'));
    }
}
