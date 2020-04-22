<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TripStage extends Model
{
    //
    protected $table='trip_stages';

    protected $fillable= ['trip_id', 'status_id'];

    public function status(){
        return $this->hasOne('App\TripStatusMessage', 'id', 'status_id');
    }
}
