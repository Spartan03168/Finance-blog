<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Banks extends Model{
    // Column names: Bank name, headquarters, Number of branches, Countries with branches
    protected $table = "banks";
    protected $fillable = ["bank_name","headquarters", "number_of_branches", "countries_with_branches"];

    public static function banksDataExtraction(){
        //
        }
    }
