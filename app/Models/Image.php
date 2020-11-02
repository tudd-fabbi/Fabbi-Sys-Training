<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    function userImage(){
        $this->belongsTo(User::class, 'id', 'imgable_id');
    }
    function imageCourse(){
        $this->belongsTo(Course::class, 'id', 'imgable_id');
    }
}
