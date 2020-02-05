<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trip extends Model
{
    //

    protected $table = 'trips';

    protected $fillable = ['user_id', 'driver_id', 'destination', 'coupon', 'trip_start', 'trip_end', 'status_id', 'price'];

    use SoftDeletes;

    public function destination(){
        return $this->hasOne('App\UserLocation', 'destination', 'id');
    }
}
