<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    //
    protected $table = 'cards';

    protected $fillable = ['user_id', 'customer_code', 'authorization_code','customer_id', 'last_four', 'default'];

    public function user(){
        return $this->hasOne('App\User', 'user_id', 'id');
    }

    protected $hidden = ['customer_code', 'authorization_code', 'customer_id', 'user_id'];

}
