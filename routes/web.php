<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// ─── Frontend Pages ────────────────────────────────────────────────────────
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/reviews', [App\Http\Controllers\Admin\ReviewController::class, 'storeFrontend'])->name('reviews.storeFrontend');

Route::get('/about-us', function () {
    return view('pages.about-us');
})->name('about-us');

Route::get('/courses', [\App\Http\Controllers\HomeController::class, 'courses'])->name('courses');

Route::get('/courses/{slug}', [\App\Http\Controllers\CourseController::class, 'show'])->name('courses.show');

// Study Materials
Route::prefix('study-material')->name('study-material.')->group(function () {
    Route::get('/', [App\Http\Controllers\StudyMaterialController::class, 'index'])->name('index');
    Route::get('/{class:slug}', [App\Http\Controllers\StudyMaterialController::class, 'showLanguages'])->name('languages');
    Route::get('/{class:slug}/{language:slug}', [App\Http\Controllers\StudyMaterialController::class, 'showYears'])->name('years');
    Route::get('/{class:slug}/{language:slug}/{studyYear:year}', [App\Http\Controllers\StudyMaterialController::class, 'showPapers'])->name('papers');
});

Route::get('/blog', [\App\Http\Controllers\BlogFrontendController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [\App\Http\Controllers\BlogFrontendController::class, 'show'])->name('blog.show');

Route::get('/contact', [\App\Http\Controllers\HomeController::class, 'index'])->name('contact');
Route::post('/contact/store', [\App\Http\Controllers\HomeController::class, 'storeContact'])->name('contact.store');

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
