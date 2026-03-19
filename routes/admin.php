<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Courses
    Route::resource('courses', CourseController::class);

    // Users & Roles
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);

    // Pages
    Route::resource('pages', PageController::class);

    // Settings
    Route::resource('settings', SettingController::class)->only(['index', 'store', 'update']);

    // Media
    Route::resource('media', MediaController::class)->only(['index', 'store', 'destroy']);

    // Content Blocks
    Route::get('content/home', [\App\Http\Controllers\Admin\HomePageController::class, 'index'])->name('content.home');
    Route::post('content/home', [\App\Http\Controllers\Admin\HomePageController::class, 'store'])->name('content.home.store');
    
    Route::get('content/about', [\App\Http\Controllers\Admin\AboutPageController::class, 'index'])->name('content.about');
    Route::post('content/about', [\App\Http\Controllers\Admin\AboutPageController::class, 'store'])->name('content.about.store');
});
