<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banks;

class create_blog extends Controller
{
    public function create() {
        $banks = Banks::all();
        return view('blogs.create', compact('banks'));
    }
}
