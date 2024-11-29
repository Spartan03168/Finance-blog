<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CRUD_interface_link extends Controller {
    // ---------------------------------
    public function create_mode() {
        return view("PostEditor");
        }
    // ---------------------------------
    public function store(Request $request) {
        DB::insert('INSERT INTO blogs (post_title, content, date_and_time_of_upload) VALUES (?, ?, ?)', [
            $request->input('title'),
            $request->input('content'),
            $request->input('date'),
            ]);
        return redirect()->route('Blog.index')->with('success', 'Post created successfully.');
        }
    // ---------------------------------
    public function update_mode(Request  $request, $id) {
        // ---> Update mode <---
        DB::update('UPDATE blogs SET title = ?, content = ?, date = ? WHERE id = ?', [
            $request->input('title'),
            $request->input('content'),
            $request->input('date'),
            $id,
            ]);
        return redirect()->route('Blog.index')->with('success', 'Post updated successfully.');
        }
    // ---------------------------------
    public function delete_mode($id) {
        // ---> Delete mode <---
        DB::delete('DELETE FROM blogs WHERE id = ?', [$id]);
        return redirect()->route("Blog.index")->with("success", "Blog deleted successfully");
            }
        }
