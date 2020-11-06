<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $filable = ['id','name'];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role','role_permission','role_id','permission_id');
    }
}
