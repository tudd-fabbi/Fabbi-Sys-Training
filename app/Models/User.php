<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address', 'birthday', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    function roleUser(){
        return $this->hasMany(Role::class);
    }
    function imageUser(){
        $this->hasOne(Image::class, 'id', 'imgable_id');
    }
    function subjectUser(){
        $this->belongsToMany(Subject::class, 'user_subject', 'user_id', 'subject_id');
    }
    function courseUser(){
        $this->belongsToMany(Course::class, 'user_course', 'user_id', 'course_id');
    }
    function taskUser(){
        $this->belongsToMany(Task::class, 'user_task', 'user_id', 'task_id');
    }
}
