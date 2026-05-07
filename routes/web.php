<?php

use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\BlogFrontendController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudyMaterialController;
use Illuminate\Support\Facades\Route;

// ─── Frontend Pages ────────────────────────────────────────────────────────
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/reviews', [ReviewController::class, 'storeFrontend'])->name('reviews.storeFrontend');

Route::get('/about-us', [HomeController::class, 'about'])->name('about-us');

Route::get('/courses', function () {
    return view('pages.courses');
})->name('courses');

Route::get('/jee-classes-in-mulund', function () {
    return view('pages.courses.jee-mains-advanced');
})->name('courses.jee-mains-advanced');

Route::get('/neet-classes-in-mulund', function () {
    return view('pages.courses.neet');
})->name('courses.neet');

Route::get('/mht-cet-classes-in-mulund', function () {
    return view('pages.courses.mht-cet');
})->name('courses.mht-cet');

Route::get('/science-classes-in-mulund', function () {
    return view('pages.courses.science');
})->name('courses.science');

Route::get('/foundation-classes-in-mulund', function () {
    return view('pages.courses.foundation');
})->name('courses.foundation');

Route::get('/school-section-classes-in-mulund', function () {
    return view('pages.courses.school-section');
})->name('courses.school-section');

// Study Materials
Route::prefix('study-material')->name('study-material.')->group(function () {
    Route::get('/', [StudyMaterialController::class, 'index'])->name('index');
    Route::post('/verify-lead', [\App\Http\Controllers\Frontend\StudyLeadController::class, 'store'])->name('verify-lead');
    Route::get('/{class:slug}', [StudyMaterialController::class, 'showYears'])->name('years');
    Route::get('/{class:slug}/{studyYear:year}', [StudyMaterialController::class, 'showPapers'])->name('papers');
});

Route::get('/blog', [BlogFrontendController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogFrontendController::class, 'show'])->name('blog.show');

// Contact Inquiries
Route::get('/contact', [HomeController::class, 'index'])->name('contact');
Route::post('/contact', [HomeController::class, 'storeContact'])->name('contact.store');

// Gallery
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

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
Route::get('/{slug}', [FrontendController::class, 'show'])->name('pages.show');
