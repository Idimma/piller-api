<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    protected $fillable = [
        'user_id', 'start_date', 'deposit', 'plan_type', 'plan_name',
        'building_type', 'material_estimation', 'material_type', 'plan_status',
        'cement_percentage', 'block_percentage', 'deposit_frequency',
        'block_target', 'cement_target', 'country',
    ];

    protected $with = [
        'user:uuid,first_name,last_name',
    ];

    protected $hidden = ['user_id'];
    use SoftDeletes;


    public $appends = ['next_deposit_date', 'frequency'];

    public function getNextDepositDateAttribute()
    {
        return now();
    }

    public function getFrequencyAttribute()
    {
        if ($this->deposit_frequency == 1) {
            return 'Daily';
        }
        if ($this->deposit_frequency == 7) {
            return 'Weekily';
        }
        if ($this->deposit_frequency == 30) {
            return 'Monthly';
        }
        return "Once";
    }

    public function card()
    {
        return $this->hasOne('App\Card', 'id', 'card_id') ?? collect(['last_four' => 'Add Card']);
    }

    public function destinations()
    {
        return $this->hasOne('App\UserLocation', 'id', 'destination');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function transactions()
    {
        return $this->hasMany('App\Transactions', 'plan_id', 'id');
    }
}
