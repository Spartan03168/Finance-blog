<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\Banks;
use App\Models\Blogs_stored;

class BlogPage extends Controller{

    public function index() {
        $posts = Blogs_stored::with('bank')->get();
        return view('blogs.index', compact('posts'));
        }

    public function create() {
        $banks = Banks::all();
        return view('blogs.create', compact('banks'));
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

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'bank_id' => 'required|exists:banks,id',
        ]);

        Blogs_stored::create($validated);
        return redirect()->route('blogs.index')->with('success', 'Post created successfully.');
        }

    public function delete($id) {
        $blog = Blogs_stored::findOrFail($id);
        $blog->delete();

        return redirect()->route('Blog.index')->with('success', 'Blog deleted successfully.');
        }

    public function edit($id) {
        $post = Blogs_stored::findOrFail($id);
        $banks = Banks::all();
        return view('blogs.edit', compact('post', 'banks'));
        }
    }
