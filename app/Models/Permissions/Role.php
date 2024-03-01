<?php

namespace App\Models\Permissions;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'id', 'name', 'all'
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_roles', 'role_id' ,'permission_id');
    }

    public function users()
    {
   	    return $this->belongsToMany(\App\User::class, 'user_roles', 'role_id', 'user_id')->where('users.active', 1)->whereNull('deleted_at');
    }
}
