<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    //
    protected $table = 'transactions';

    protected $fillable = ['user_id', 'plan_id', 'status', 'reference'];

    protected $with = ['total_paid', 'material_withdrawn', 'material_deposited'];

    public function getTotalPaidAttribute()
    {
        return self::where('type', 'credit')->sum('amount');
    }

    public function getMaterialWithdrawnAttribute()
    {
        $w = self::where('type', 'debit');
        return ['blocks' => $w->sum('block'), 'cements' => $w->sum('cement')];
    }

    public function getMaterialDepositedAttribute()
    {
        $w = self::where('type', 'credit');
        return ['blocks' => $w->sum('block'), 'cements' => $w->sum('cement')];
    }


    public function plans()
    {
        return $this->hasOne('App\Plan', 'plan_id', 'id');
    }

}
