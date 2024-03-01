<?php

namespace App\Models\Permissions;

use Illuminate\Database\Eloquent\Model;

class PermissionUser extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'permission_id'
    ];
}
