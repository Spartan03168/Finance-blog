<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\Banks;
use App\Models\Blogs_stored;

class BlogPage extends Controller{

    public function store(Request $request) {
        $validatedData = $request->validate ([
            'title' => 'required|max:255',
            'content' => 'required',
            'bank_id' => 'required|exists:banks,id', // Ensure the bank exists
            ]);

        Blogs_stored::create($validatedData);

        return redirect()->route('Blog.index')->with('success', 'Post created successfully.');
        }

    public function update(Request $request, $id) {
        $validatedData = $request->validate ([
            'title' => 'required|max:255',
            'content' => 'required',
            ]);

        $blog = Blogs_stored::findOrFail($id);
        $blog->update($validatedData);

        return redirect()->route('Blog.index')->with('success', 'Post updated successfully.');
        }

    public function delete($id) {
        $blog = Blogs_stored::findOrFail($id);
        $blog->delete();

        return redirect()->route('Blog.index')->with('success', 'Blog deleted successfully.');
        }

    public function index() {
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
            }

    }
