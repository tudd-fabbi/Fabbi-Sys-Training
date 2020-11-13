<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    function roles(){
        return $this->belongsToMany(Role::class, 'role_permission', 'permission_id', 'role_id');
    }
}
