<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'tasks';

    protected $fillable = [
        'name', 'content', 'description', 'deadline', 'is_active'
    ];

    function userTask(){
        return $this->belongsToMany(User::class, 'user_task','task_id','user_id');
    }
    function subjectTask(){
        return $this->belongsToMany(Subject::class, 'subject_task','task_id','subject_id');
    }
}
