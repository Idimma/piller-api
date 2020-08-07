<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $fillable = ['email', 'token'];
    protected $primaryKey= "email";
    protected $hidden =[];
    public $timestamps = false;

}
