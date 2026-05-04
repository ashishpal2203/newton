<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Contact;
use App\Models\Course;
use App\Models\LatestUpdate;
use App\Models\PhaseSlider;
use App\Models\Review;
use App\Models\StudyClass;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::where('status', true)->orderBy('sort_order', 'asc')->get();
        $latestUpdates = LatestUpdate::where('status', true)->orderBy('sort_order', 'asc')->take(2)->get();
        $courses = Course::where('is_featured', true)->get();
        $reviews = Review::where('status', true)->orderBy('sort_order', 'asc')->get();
        $studyClasses = StudyClass::where('status', true)->orderBy('id', 'asc')->get();
        $phaseSlides = PhaseSlider::with('mentors')->where('status', true)->orderBy('sort_order', 'asc')->get();

        return view('pages.home', compact('courses', 'banners', 'reviews', 'latestUpdates', 'studyClasses', 'phaseSlides'));
    }

    public function about()
    {
        $reviews = Review::where('status', true)->orderBy('sort_order', 'asc')->get();

        return view('pages.about-us', compact('reviews'));
    }

    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'class' => 'required|string|max:100',
            'stream' => 'required|string|max:100',
            'message' => 'nullable|string',
        ]);

        Contact::create($validated);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Your request has been submitted successfully. We will contact you soon.',
            ]);
        }

        return back()->with('success', 'Your request has been submitted successfully. We will contact you soon.');
    }

    public function courses()
    {
        $courses = Course::all();

        return view('pages.courses', compact('courses'));
    }
}
