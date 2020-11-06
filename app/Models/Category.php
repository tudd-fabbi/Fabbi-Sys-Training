<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['id','name','parent_id'];

    public function courses()
    {
        return $this->hasMany('App\Models\Course');
    }
}
