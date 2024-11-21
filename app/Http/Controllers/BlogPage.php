<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banks;

class BlogPage extends Controller{
    public function index(){
        $db_access = 0;
        $clearance_authorization = 0;
        if ($db_access === 0) {
            // Initial for now until I get the Banks and blogs model integrated
            return view("Blog.index");
        } elseif ($db_access === 1) {
            // Assuming the database has been properly set up
            $clearance_authorization = 1;
        } else{
            // Failsafe response
            return view("Blog.index");
            }
    }
}
