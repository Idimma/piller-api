<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserLocation extends Model
{
    //
    protected $table = 'user_locations';

    protected $fillable = ['user_id', 'address', 'lat', 'lon'];

    protected $hidden = ['user_id'];
    use SoftDeletes;
}
