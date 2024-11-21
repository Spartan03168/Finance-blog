<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banks;
use App\Models\Blogs_stored;

class BlogPage extends Controller{
    public function index(){
        $db_access = 0;
        if ($db_access === 0) {
            // Initial for now until I get the Banks and blogs model integrated
            return view("Blog.index");
        } elseif ($db_access === 1) {
            // Assuming the database has been properly set up
            $bank_data = Banks::banksDataExtraction();
            $posts_data = Blogs_stored::postExtractionProtocol();
            // Return process
            return view('Blog.index', compact('bank_data', 'posts_data'));
        } else{
            // Failsafe response
            return view("Blog.index");
            }
        }
    }
