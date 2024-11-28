<?php

namespace App\Http\Controllers;
use App\Models\Blogs_stored;
use Illuminate\Http\Request;

class PostEditor extends Controller {
    // Posts controller with access to posts database.
    public function index() {
        $posts_data = Blogs_stored::all();
        return view('PostEditor', ['posts_data' => $posts_data]);
        }
    }
