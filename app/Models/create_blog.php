<?php

namespace App\Http\Controllers;
namespace App\Models;
use Illuminate\Http\Request;
use App\Models\Banks;
use App\Models\Blogs_stored;
use Illuminate\Routing\Controller;

class create_blog extends Controller {
    public function index(Request $request) {
        $banks = Banks::all();
        return view('create_blog_post', compact('banks'));
        }
    }
