<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\Banks;
use App\Models\Blogs_stored;

class BlogPage extends Controller{

    public function index() {
        $posts = Cache::remember('posts_with_banks', 60, function () {
            return Blogs_stored::with('bank')->get();
            });
        // Cache flushing after every update
        Cache::tags(['blogs', 'banks'])->flush();
        return view('blog.index', compact('posts'));
        }

    public function getCachedPosts(){
        return Cache::remember('posts_with_banks', 60, function () {
            return Blogs_stored::with('bank')->get();
            });
        Cache::tags(['blogs', 'banks'])->flush();
        }
    }
