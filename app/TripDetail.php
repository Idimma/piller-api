<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class TripDetail extends Model
{
    //
    protected $table = 'trip_details';

    protected $fillable = ['trip_id', 'rating', 'review'];
}
