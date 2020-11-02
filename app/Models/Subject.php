<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    function userSubject(){
        return $this->belongsToMany(User::class, 'user_subject', 'subject_id', 'user_id');
    }
    function taskSubject(){
        return $this->belongsToMany(Task::class, 'subject_task', 'subject_id', 'task_id');
    }
}
