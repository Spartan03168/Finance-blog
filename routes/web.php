<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\IntroPage;
use \App\Http\controllers\BlogPage;
use \App\Http\controllers\PostEditor;
use \App\Http\controllers\CRUD_interface_link;

Route::get('/', function () {
    return view('welcome');
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

// ---- Custom routing ----
Route::get("/welcome_page",[IntroPage::class,"index"]) -> name("WelcomePage.index");
Route::get("/blog", [BlogPage::class, "index"]) -> name("Blog.index");
Route::get("/edit_mode", [PostEditor::class, "index"]) -> name("PostEditor.index");
// -----------------------

// ---- CRUD routing components ----
// > Editing <
Route::get("edit_posts/{id}", [CRUD_interface_link::class, "edit"])->name("PostEditor.edit");
Route::post("update_posts", [CRUD_interface_link::class, "update"])->name("PostEditor.update");
// > Creation of posts <
Route::get("create_posts", [CRUD_interface_link::class, "create"])->name("PostEditor.create");
Route::post("store_posts", [CRUD_interface_link::class, "store"])->name("PostEditor.store");
// > Delete <
Route::delete("delete_post/{id}", [CRUD_interface_link::class, "delete"])->name("PostEditor.delete");
