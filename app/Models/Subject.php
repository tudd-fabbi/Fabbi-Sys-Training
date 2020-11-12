<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name',
        'description',
        'is_active',
    ];
    function users()
    {
        return $this->belongsToMany(User::class, 'user_subject');
    }
    function tasks()
    {
        return $this->belongsToMany(Task::class, 'subject_task');
    }
<<<<<<< HEAD
    function courses(){
        return$this->belongsToMany(Subject::class, 'course_subject', 'course_id', 'subject_id');
=======
    function courses()
    {
        return $this->belongsToMany(Course::class, 'course_subject');
>>>>>>> update/BE/Api/Add-Update-Delete/Subject
    }
}
