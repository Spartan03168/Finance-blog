<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Blogs_stored extends Model{
    // Columns: Post title, Date and time of upload, Content
    protected $fillable = ["post_title", "date_and_time_of_upload", "content", "bank_id"];
    protected $table = "blogs";
    protected $casts = [
        "date_and_time_of_upload" => "datetime",
        ];

    // Relationship connection to blogs
    public function bank(){
        return $this->belongsTo(Blogs_stored::class, "bank_id", "id");
        }
    }
