<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Intermediate extends Controller {
    public function index(){
        if (Auth::check()) {
            return redirect()->route("BlogView");
            }
        // Page render
        return redirect()->route('login');
        }
    }
