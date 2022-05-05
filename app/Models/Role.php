<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public $guarded = [];
    public function user_roles_role(){
        return $this->hasMany(RoleUser::class,'role_id');
    }
}
