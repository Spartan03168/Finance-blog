<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IntroPage;
use App\Http\Controllers\BlogPage;
use App\Http\Controllers\PostEditor;
use App\Http\Controllers\Intermediate;
use Illuminate\Support\Facades\Route;

// Display welcome page
Route::view('/', 'welcome')->name('welcome');

// Authentication routes
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Blog related routes
    Route::resource('blogs', BlogPage::class)->names([
        'index' => 'blog.index',
        'create' => 'blog.create',
        'store' => 'blog.store',
        'show' => 'blog.show',
        'edit' => 'blog.edit',
        'update' => 'blog.update',
        'destroy' => 'blog.delete'
    ]);

    // Intermediate checkpoint (if needed)
    Route::get('/checkpoint', [Intermediate::class, 'index'])->name('checkpoint');

    // Post Editor routes (if separate functionality needed beyond CRUD)
    Route::get('/edit_mode', [PostEditor::class, 'index'])->name('editor.index');
});

// Introductory pages
Route::get('/welcome_page', [IntroPage::class, 'index'])->name('welcome.page');
