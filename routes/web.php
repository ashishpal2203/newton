<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// ─── Frontend Pages ────────────────────────────────────────────────────────
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/reviews', [App\Http\Controllers\Admin\ReviewController::class, 'storeFrontend'])->name('reviews.storeFrontend');

Route::get('/about-us', [\App\Http\Controllers\HomeController::class, 'about'])->name('about-us');

Route::get('/courses', function() { return view('pages.courses'); })->name('courses');

Route::group(['prefix' => 'courses', 'as' => 'courses.'], function () {
    Route::get('/class-x', function() { return view('pages.courses.class-x'); })->name('class-x');
    Route::get('/class-xii', function() { return view('pages.courses.class-xii'); })->name('class-xii');
    Route::get('/jee-mains-advanced', function() { return view('pages.courses.jee-mains-advanced'); })->name('jee-mains-advanced');
    Route::get('/neet', function() { return view('pages.courses.neet'); })->name('neet');
    Route::get('/school-section', function() { return view('pages.courses.school-section'); })->name('school-section');
    Route::get('/sci-comm', function() { return view('pages.courses.sci-comm'); })->name('sci-comm');
    Route::get('/mht-cet', function() { return view('pages.courses.mht-cet'); })->name('mht-cet');
    Route::get('/integrated-classes', function() { return view('pages.courses.integrated-classes'); })->name('integrated-classes');
});

// Study Materials
Route::prefix('study-material')->name('study-material.')->group(function () {
    Route::get('/', [App\Http\Controllers\StudyMaterialController::class, 'index'])->name('index');
    Route::get('/{class:slug}', [App\Http\Controllers\StudyMaterialController::class, 'showYears'])->name('years');
    Route::get('/{class:slug}/{studyYear:year}', [App\Http\Controllers\StudyMaterialController::class, 'showPapers'])->name('papers');
});

Route::get('/blog', [\App\Http\Controllers\BlogFrontendController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [\App\Http\Controllers\BlogFrontendController::class, 'show'])->name('blog.show');

// Contact Inquiries
Route::get('/contact', [\App\Http\Controllers\HomeController::class, 'index'])->name('contact');
Route::post('/contact', [\App\Http\Controllers\HomeController::class, 'storeContact'])->name('contact.store');

// Gallery
Route::get('/gallery', [\App\Http\Controllers\GalleryController::class, 'index'])->name('gallery.index');

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
