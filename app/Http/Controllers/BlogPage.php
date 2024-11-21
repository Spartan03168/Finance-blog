<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banks;

class BlogPage extends Controller{
    public function index(){
        $banks_access = 0;
        $clearance_authorization = 0;
        if ($banks_access === 0) {
            // Initial for now until I get the Banks and blogs model integrated
            return view("Blog.index");
        } elseif ($banks_access === 1) {
            // Assuming the database has been properly set up
            $clearance_authorization = 1;
        } else{
            // Failsafe response
            return view("Blog.index");
            }
    }
}
