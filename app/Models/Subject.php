<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
   protected $table = 'subjects';
   protected $fillable = ['id','name','description','is_active'];

   public function users()
   {
       return $this->belongsToMany('App\Models\Subject','user_subject','subject_id','user_id');
   }

   public function tasks()
   {
       return $this->belongsToMany('App\Models\Task','subject_task','subject_id','task_id');
   }
}
