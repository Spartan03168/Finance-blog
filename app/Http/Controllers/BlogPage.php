<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banks;

class BlogPage extends Controller{
    public function index(){
        $banks_access = 0;
        $clearance_authorization = 0;
        if ($banks_access === 0) {
            return view("Blog.index");
        } elseif ($banks_access === 1) {
            $clearance_authorization = 1;
        }

    }
}
