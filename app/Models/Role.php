<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['id','name'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission','role_permission','permission_id','role_id');
    }
}
