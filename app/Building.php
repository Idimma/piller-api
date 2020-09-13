<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $fillable = ['title', 'description', 'cement', 'block'];
    protected $appends = ['description'];

    public function getDescriptionAttribute()
    {
        return "$this->block Blocks, $this->cement Cements";
    }
}
