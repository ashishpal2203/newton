<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Users & Roles
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);

    // Pages
    
    // Study Materials
    Route::resource('study-classes', \App\Http\Controllers\Admin\StudyClassController::class);
    Route::resource('study-languages', \App\Http\Controllers\Admin\StudyLanguageController::class);
    Route::resource('study-years', \App\Http\Controllers\Admin\StudyYearController::class);
    Route::resource('study-papers', \App\Http\Controllers\Admin\StudyPaperController::class);

    // Reviews
    Route::post('reviews/reorder', [\App\Http\Controllers\Admin\ReviewController::class, 'reorder'])->name('reviews.reorder');
    Route::post('reviews/{review}/toggle-status', [\App\Http\Controllers\Admin\ReviewController::class, 'toggleStatus'])->name('reviews.toggle_status');
    Route::resource('reviews', \App\Http\Controllers\Admin\ReviewController::class);

    // Blogs
    Route::resource('blog-categories', \App\Http\Controllers\Admin\BlogCategoryController::class);
    Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class);

    // Settings
    Route::resource('settings', SettingController::class)->only(['index', 'store', 'update']);

    // Media
    Route::resource('media', MediaController::class)->only(['index', 'store', 'destroy']);

    // Contacts
    Route::resource('contacts', \App\Http\Controllers\Admin\ContactController::class)->only(['index', 'show', 'destroy']);

    // Banner Slider
    Route::prefix('home-sections')->name('home.sections.')->group(function () {
        Route::post('banner/reorder', [\App\Http\Controllers\Admin\BannerController::class, 'reorder'])->name('banner.reorder');
        Route::post('banner/{banner}/toggle-status', [\App\Http\Controllers\Admin\BannerController::class, 'toggleStatus'])->name('banner.toggle_status');
        Route::resource('banner', \App\Http\Controllers\Admin\BannerController::class);
    });

    // Latest Updates
    Route::post('latest-updates/reorder', [\App\Http\Controllers\Admin\LatestUpdateController::class, 'reorder'])->name('latest-updates.reorder');
    Route::post('latest-updates/{latest_update}/toggle-status', [\App\Http\Controllers\Admin\LatestUpdateController::class, 'toggleStatus'])->name('latest-updates.toggle_status');
    Route::resource('latest-updates', \App\Http\Controllers\Admin\LatestUpdateController::class);
});
