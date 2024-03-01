<?php

namespace App\Models\Models\Permissions;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    public $timestamps = false;

    protected $table = 'user_roles';

    protected $fillable = [
        'user_id', 'role_id'
    ];

    public function user()
    {
   		return $this->hasOne(\App\User::class, 'id', 'user_id');
    }
}
