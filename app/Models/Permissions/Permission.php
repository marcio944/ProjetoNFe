<?php

namespace App\Models\Permissions;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'group_id', 'name', 'display_name'
    ];

   public function role()
   {
      return $this->belongsToMany(Role::class);
   }

   public function roles()
   {
      return $this->belongsToMany(Role::class, 'permission_roles', 'permission_id', 'role_id');
   }

   public function permissionUser()
   {
        return $this->hasMany(PermissionUser::class, 'permission_id', 'id');
   }
}
