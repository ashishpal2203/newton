<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->paginate(20);
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:courses,slug',
            'banner' => 'nullable|image|max:2048',
            'about_title' => 'required|string|max:255',
            'about_text' => 'required|string',
            'info_boxes' => 'nullable|array',
            'program_details' => 'nullable|array',
            'highlights' => 'nullable|array',
            'home_icon' => 'nullable|image|max:1024',
            'home_subtitle' => 'nullable|string',
            'home_color' => 'required|string',
            'is_featured' => 'nullable'
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        if ($request->hasFile('banner')) {
            $validated['banner'] = $request->file('banner')->store('courses/banners', 'public');
        }

        if ($request->hasFile('home_icon')) {
            $validated['home_icon'] = $request->file('home_icon')->store('courses/icons', 'public');
        }
        
        $validated['is_featured'] = $request->has('is_featured');
        
        $validated['info_boxes'] = array_values(array_filter($request->input('info_boxes', []), function($item) {
            return !empty($item['label']) && !empty($item['value']);
        }));
        
        $validated['program_details'] = array_values(array_filter($request->input('program_details', []), function($item) {
            return !empty($item['title']) && !empty($item['content']);
        }));
        
        $validated['highlights'] = array_values(array_filter($request->input('highlights', [])));

        Course::create($validated);

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:courses,slug,' . $course->id,
            'banner' => 'nullable|image|max:2048',
            'about_title' => 'required|string|max:255',
            'about_text' => 'required|string',
            'info_boxes' => 'nullable|array',
            'program_details' => 'nullable|array',
            'highlights' => 'nullable|array',
            'home_icon' => 'nullable|image|max:1024',
            'home_subtitle' => 'nullable|string',
            'home_color' => 'required|string',
            'is_featured' => 'nullable'
        ]);

        if ($request->hasFile('banner')) {
            $validated['banner'] = $request->file('banner')->store('courses/banners', 'public');
        }

        if ($request->hasFile('home_icon')) {
            $validated['home_icon'] = $request->file('home_icon')->store('courses/icons', 'public');
        }
        
        $validated['is_featured'] = $request->has('is_featured');
        
        $validated['info_boxes'] = array_values(array_filter($request->input('info_boxes', []), function($item) {
            return !empty($item['label']) && !empty($item['value']);
        }));
        
        $validated['program_details'] = array_values(array_filter($request->input('program_details', []), function($item) {
            return !empty($item['title']) && !empty($item['content']);
        }));
        
        $validated['highlights'] = array_values(array_filter($request->input('highlights', [])));

        $course->update($validated);

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully.');
    }
}
