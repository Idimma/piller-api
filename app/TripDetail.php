<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class TripDetail extends Model
{
    //
    protected $table = 'trip_details';

    protected $fillable = ['reviewer_id','trip_id', 'rating', 'review'];
}
