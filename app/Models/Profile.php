<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id', 'cpf_cnpj', 'fantasy_name', 'registration', 'municipal_registration', 'state_registration', 'phone', 'address_id', 'user_id'
   	];
}
