<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Banks extends Model{
    // Column names: Bank name, headquarters, Number of branches, Countries with branches
    protected $fillable = ["bank_name","headquarters", "number_of_branches", "countries_with_branches"];
    public static function banksDataExtraction(){
        $path = storage_path("app/public/Banks_DB.csv");
        // Existence authentication
        if (!file_exists($path)){
            return [];
            }
        // ---> Extraction process <---
        $data = array_map("str_getcsv",file($path));
        $headers = array_shift($data);
        // Conversion to CSV rows
        return array_map(function ($row) use ($headers){
            // Row validation
            if (count($row) !== count($headers)){
                return null;
                }
            return array_combine($headers, $row);
            }, $data);
        }
    }
