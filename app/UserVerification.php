<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserVerification extends Model
{
    //

    protected $table = 'user_verifications';

    protected $fillable = ['user_id', 'token'];

    protected $with = ['user'];

    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }

}
