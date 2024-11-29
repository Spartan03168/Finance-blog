<?php

namespace App\Http\Controllers;

use App\Models\Blogs_stored;
use Illuminate\Http\Request;

class CRUD_interface_link extends Controller {
    public function edit_mode($id) {
        // ---> Edit mode <---
        $post_data = Blogs_stored::findOrFail($id);
        return view("PostEditor", compact("post_data"));
        }

    public function update_mode(Request $request, $id) {
        // ---> Update mode <---
        $validatedData = $request->validate([
            'id' => 'required|exists:blogs_stored,id',
            'title' => 'required|string|max:255',
            'content' => 'required',
            'date_and_time_of_upload' => 'required|date',
            ]);
        // Track post by ID
        $post_tracked = Blogs_stored::findOrFail($validatedData["id"]);
        $post_tracked->update($validatedData);
        // Return the redirect
        return redirect()->route("BlogView")->with("success", "Blog updated successfully");
        }

    public function delete_mode($id) {
        // ---> Delete mode <---
        $post_data = Blogs_stored::findOrFail($id);
        $post_data->delete();
        return redirect()->route("BlogView")->with("success", "Blog deleted successfully");
        }
    }
