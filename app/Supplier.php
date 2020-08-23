<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['local', 'international', 'name', 'address', 'note', 'city', 'state', 'country'];
}
