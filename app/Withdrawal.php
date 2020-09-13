<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    protected $fillable = ['user_id', 'plan_id', 'block_unit', 'cement_unit', 'location_type', 'address'];

    protected $casts = [
        'address' => 'array',
        'blocks' => 'array',
        'cements' => 'array',
    ];

}
