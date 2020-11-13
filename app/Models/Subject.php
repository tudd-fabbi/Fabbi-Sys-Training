<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    function users(){
        return $this->belongsToMany(User::class, 'user_subject');
    }
    function tasks(){
        return $this->belongsToMany(Task::class, 'subject_task');
    }
    function courses(){
        return$this->belongsToMany(Subject::class, 'course_subject', 'course_id', 'subject_id');
    }
}
