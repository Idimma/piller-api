<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TripStatusMessage extends Model
{
    //

    protected $table = 'trip_status_messages';

    protected $fillable = ['status'];


}
