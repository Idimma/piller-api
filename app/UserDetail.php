<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    //

    protected $table = 'user_details';

    protected $fillable = ['user_id', 'expiry_date', 'driving_license', 'bank_name', 'account_name', 'account_number'];
}

