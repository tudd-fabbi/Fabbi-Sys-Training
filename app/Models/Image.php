<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    function userImage(){
        $this->belongsTo(User::class, 'imgable_id', 'id');
    }
    function imageCourse(){
        $this->belongsTo(Course::class, 'imgable_id', 'id');
    }
}
