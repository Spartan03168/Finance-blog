<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\IntroPage;
use \App\Http\controllers\BlogPage;
use \App\Http\controllers\PostEditor;
use \App\Http\controllers\Intermediate;
use \App\Models\Blogs_stored;
use \App\Http\controllers\CRUD_interface_link;

Route::get('/', function () {
    return view('welcome');
});
// ---- Web middleware ----
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
Route::get("/welcome_page", [IntroPage::class, "index"])->name("WelcomeView");
Route::middleware('auth')->group(function () {
    Route::get("/checkpoint", [Intermediate::class, 'index'])->name('Intermediate.index');
    Route::get('/blog', [BlogPage::class, 'index'])->name('blog.index');
    Route::get("/edit", [PostEditor::class, 'index'])->name('post.index');
    });

// ---- Custom routing ----
Route::get("/", function () {return view("welcome"); });
Route::get("/welcome_page",[IntroPage::class,"index"]) -> name("WelcomeView");
Route::get("/blog", [BlogPage::class, "index"]) -> name("BlogView");
Route::get("/edit_mode", [PostEditor::class, "index"]) -> name("PostEditor.index");
Route::get("/checkpoint", [Intermediate::class, "index"]) -> name("Intermediate.index");
// -----------------------

// ---- CRUD routing components(Purge scheduled) ----
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

// ---- Specific blog routing
Route::post("/blog", [Blogs_stored::class, "storeOrUpdate"])->name("PostEditor.store");

// ---- Authentication routing ----
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// ---- User clearance level ----
// Non-admin blog routes
Route::middleware(['auth'])->group(function () {
    Route::get('/blogs', [BlogPage::class, 'index'])->name('blog.index');
    Route::get('/blogs/create', [BlogPage::class, 'create'])->name('blog.create');
    Route::post('/blogs', [BlogPage::class, 'store'])->name('blogs.store');
    Route::get('/blogs/{id}/edit', [BlogPage::class, 'edit'])->name('blog.edit');
    Route::put('/blogs/{id}', [BlogPage::class, 'update'])->name('blog.update');
    Route::delete('/blogs/{id}', [BlogPage::class, 'delete'])->name('blog.delete');
    });

// Admin-only routes. Has more access.
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/blogs', [BlogPage::class, 'adminIndex'])->name('admin.blogs.index');
    });

// --- Eliquent ORM mechanisms ---
Route::get('/blogs', [BlogPage::class, 'index'])->name('Blog.index');
Route::get('/blogs/create', [BlogPage::class, 'create'])->name('blog.create');
Route::post('/blogs', [BlogPage::class, 'store'])->name('blog.store');
Route::get('/blogs/{id}/edit', [BlogPage::class, 'edit'])->name('blog.edit');
Route::put('/blogs/{id}', [BlogPage::class, 'update'])->name('blog.update');
Route::delete('/blogs/{id}', [BlogPage::class, 'delete'])->name('blog.delete');
