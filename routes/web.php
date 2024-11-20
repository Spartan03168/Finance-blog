<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\IntroPage;
use \App\Http\controllers\BlogPage;

Route::get('/', function () {
    return view('welcome');
});

// ---- Dashboard ----

// ---- Custom routing ----
Route::get("/welcome_page",[IntroPage::class,"index"]) -> name("WelcomePage.index");
Route::get("/blog", [BlogPage::class, "index"]) -> name("Blog.index");
// -----------------------
