<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IntroPage;
use App\Http\Controllers\BlogPage;
use App\Http\Controllers\PostEditor;
use App\Http\Controllers\Intermediate;
use Illuminate\Support\Facades\Route;

// General routes
Route::view('/', 'welcome');
Route::view('/dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');

// Authentication Routes
require __DIR__.'/auth.php';

// Authenticated routes for user profiles and blogs
Route::middleware(['auth'])->group(function () {
    // Profile management
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Blog management routes using Eloquent's RESTful resource handling
    Route::resource('blogs', BlogPage::class)->names([
        'index' => 'blogs.index',
        'create' => 'blogs.create',
        'store' => 'blogs.store',
        'edit' => 'blogs.edit',
        'update' => 'blogs.update',
        'destroy' => 'blogs.delete',
    ]);

    // Checkpoint page for further authentication processes if needed
    Route::get('/checkpoint', [Intermediate::class, 'index'])->name('checkpoint.index');

    // Editor pages for content management
    Route::get('/edit_mode', [PostEditor::class, 'index'])->name('editor.index');
});

// Public routes that do not require authentication
Route::get('/welcome_page', [IntroPage::class, 'index'])->name('welcome.index');
