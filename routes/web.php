<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// ─── Frontend Pages ────────────────────────────────────────────────────────
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about-us', function () {
    return view('pages.about-us');
})->name('about-us');

Route::get('/courses', [\App\Http\Controllers\HomeController::class, 'courses'])->name('courses');

Route::get('/courses/{slug}', [\App\Http\Controllers\CourseController::class, 'show'])->name('courses.show');

Route::get('/study-materials', function () {
    return view('pages.study-materials');
})->name('study-materials');

Route::get('/blog', function () {
    return view('pages.blog');
})->name('blog');

Route::get('/contact', function () {
    return view('pages.home'); // Temporarily point to home if specific contact page is missing or just footer section
})->name('contact');

// ─── Auth Dashboard Redirect ────────────────────────────────────────────────
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';

// ─── Catch-all for Dynamic CMS Pages ──────────────────────────────────────
Route::get('/{slug}', [\App\Http\Controllers\FrontendController::class, 'show'])->name('pages.show');
