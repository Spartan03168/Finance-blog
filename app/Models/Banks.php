<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Banks extends Model {
    // Column names: Bank name, headquarters, Number of branches, Countries with branches
    protected $table = "banks";
    protected $fillable = ["bank_name","headquarters", "number_of_branches", "countries_with_branches"];
    // Relationship tether to Blogs
    /**
     * Define a one-to-many relationship with the Blogs_stored model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blogs() {
        return $this->hasMany(Blogs_stored::class, 'bank_id', "id");
        }
    }
