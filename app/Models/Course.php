<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    function categoryCourse(){
        return $this->belongsTo(Category::class);
    }
    function courseImage(){
        return $this->hasOne(Image::class, 'imgable_id');
    }

    function userCourse(){
        return $this->belongsToMany(User::class, 'user_course', 'course_id', 'user_id');
    }
    function subjectCourse(){
        return$this->belongsToMany(Subject::class, 'course_subject', 'course_id', 'subject_id');
    }
}
