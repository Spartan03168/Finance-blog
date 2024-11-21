<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogPage extends Controller{
    public function index(){
        return view("Blog.index");
        }
    }
