<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blogs_stored extends Model{
    // Columns: Post title, Date and time of upload, Content
    protected $fillable = ["post_title", "date_and_time_of_upload", "content"];

    public static function postExtractionProtocol(){
        $path = storage_path("app/public/Post_tracker.csv");
        // Existence authentication
        if (!file_exists($path)) {
            return [];
            }
        // File reading and row processing
        $data_identified = array_map("str_getcsv",file($path));
        $header_identified = array_shift($data_identified);
        // Conversion to CSV rows
        // Conversion to CSV rows
        return array_map(function ($row) use ($header_identified){
            // Row validation
            if (count($row) !== count($header_identified)){
                return null;
            }
            return array_combine($header_identified, $row);
        }, $data_identified);
    }
    }
