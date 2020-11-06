<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function users(){
        return $this->belongsToMany('App\Models\User', 'user_task','task_id','user_id');
    }

    public function subjects(){
        return $this->belongsToMany('App\Models\Subject', 'subject_task','task_id','subject_id');
    }

}
