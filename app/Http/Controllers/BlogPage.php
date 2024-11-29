<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\Banks;
use App\Models\Blogs_stored;

class BlogPage extends Controller{
    public function index(){
        $db_access = 1;
        if ($db_access === 0) {
            // Initial for now until I get the Banks and blogs model integrated
            return view("BlogView");
        } elseif ($db_access === 1) {
            // --- Caching process of posts data ---
            $cache_mode = 1;
            // Caching activation selection block
            if ($cache_mode === 0){
                $bank_data = Banks::all();
                $posts_data = Blogs_stored::orderBy('date_and_time_of_upload', 'desc')->get();
            } elseif ($cache_mode === 1) {
                // Posts data caching
                $posts_data = Cache::remember("posts_data",now()->addMinutes(5), function (){
                    return Blogs_stored::orderby('date_and_time_of_upload', 'desc')->get();
                    });
                // ------------------
                // Bank data caching
                $bank_data = Cache::remember("bank_data", now()->addMinutes(5), function (){
                    return Banks::all();
                    });
                }
            // --- Return process post(Potentially post caching) ---
            return view('BlogView', compact('bank_data', 'posts_data'));
        } else{
            // Failsafe response
            return view("BlogView");
            }
        }
    }
