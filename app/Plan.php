<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    protected $fillable = [
        'user_id', 'start_date', 'deposit', 'plan_type', 'plan_name', 'building_type',
        'material_estimation', 'material_type', 'cement_percentage', 'block_percentage',
        'block_target', 'cement_target'
    ];

    protected $with = [
        'user:uuid,first_name,last_name',
    ];

    protected $hidden = ['user_id'];
    use SoftDeletes;

    public function destinations()
    {
        return $this->hasOne('App\UserLocation', 'id', 'destination');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function driver()
    {
        return $this->hasOne('App\User', 'id', 'driver_id');
    }

    public function status()
    {
        return $this->hasOne('App\TripStatusMessage', 'id', 'status_id');
    }

    public function getTripByStatus(int $id)
    {
        return $this->where('status_id', $id)->with('destinations', 'user', 'driver')->latest();
    }

    public function getBulkTripByStatus(array $ids)
    {
        return $this->whereIn('status_id', $ids)->with('destinations', 'user', 'driver')->latest();

    }

    public function reviews()
    {
        return $this->hasMany('App\TripDetail', 'trip_id', 'id');
    }

    public function stages()
    {
        return $this->hasMany('App\TripStage', 'trip_id', 'id');
    }
}
