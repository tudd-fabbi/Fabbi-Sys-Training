<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    function categoryCourses(){
        return $this->hasMany(Course::class);
    }
}
