<?php

namespace App\Http\Controllers;
namespace App\Models;
use Illuminate\Http\Request;
use App\Models\Banks;
use App\Models\Blogs_stored;
use Illuminate\Routing\Controller;

class create_blog extends Controller {
    public function create(Request $request) {
        $banks = Banks::all();
        return view('blog.create', compact('banks'));
        }
    }
