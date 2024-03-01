<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id', 'zip_code', 'state', 'state_id', 'city', 'city_id', 'street', 'neighborhood', 'number', 'complement', 'latitude', 'longitude'
   	];
}
