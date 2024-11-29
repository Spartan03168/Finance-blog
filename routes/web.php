<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\IntroPage;
use \App\Http\controllers\BlogPage;
use \App\Http\controllers\PostEditor;
use \App\Http\controllers\Intermediate;
use \App\Http\controllers\CRUD_interface_link;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['web'])->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
    });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
require __DIR__.'/auth.php';

// --- Custom authentication process
Route::get("/welcome_page", [IntroPage::class, "index"])->name("WelcomePage.index");
Route::middleware('auth')->group(function () {
    Route::get("/checkpoint", [Intermediate::class, 'index'])->name('Intermediate.index');
    Route::get('/blog', [BlogPage::class, 'index'])->name('blog.index');
    Route::get("/edit", [PostEditor::class, 'index'])->name('post.index');
    });

// ---- Custom routing ----
Route::get("/", function () {return view("welcome"); });
Route::get("/welcome_page",[IntroPage::class,"index"]) -> name("WelcomePage.index");
Route::get("/blog", [BlogPage::class, "index"]) -> name("BlogView");
Route::get("/edit_mode", [PostEditor::class, "index"]) -> name("PostEditor.index");
Route::get("/checkpoint", [Intermediate::class, "index"]) -> name("Intermediate.index");
// -----------------------

// ---- CRUD routing components ----
// > Creation mode <
Route::get("/create_posts", [CRUD_interface_link::class, "create_mode"])->name("PostEditor.create");
// > Storage mode <
Route::post("/store_posts", [CRUD_interface_link::class, "store"])->name("PostEditor.store");
// > Edit mode <
Route::get("/edit_posts/{id}", [CRUD_interface_link::class, "update_mode"])->name("PostEditor.edit");
// > Update mode <
Route::post("/update_posts/{id}", [CRUD_interface_link::class, "update"])->name("PostEditor.update");
// > Deletion mode <
Route::delete("/delete_post/{id}", [CRUD_interface_link::class, "delete_mode"])->name("PostEditor.delete");

// ---- Authentication routing ----
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// ---- User clearance level ----
// User-only routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/create_post', [PostEditor::class, 'create'])->name('post.create');
    });
