<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    //
    protected $table = 'transactions';

    protected $fillable = ['user_id', 'plan_id', 'status','amount', 'reference', 'block', 'cement', 'completed'];

    // protected $with = ['total_paid', 'material_withdrawn', 'material_deposited'];

    public function getUserTotalPaid()
    {
        $user = getUser();
        $w = self::where('type', 'credit')->where('user_id', $user->id);
        return $w->sum('amount');
    }

    public function getMaterialWithdrawn()
    {
        $user = getUser();
        $w = self::where('type', 'debit')->where('user_id', $user->id);
        return ['blocks' => $w->sum('block'), 'cements' => $w->sum('cement')];
    }

    public function getMaterialDeposited()
    {
        $user = getUser();
        $w = self::where('type', 'credit')->where('user_id', $user->id);
        return ['blocks' => $w->sum('block'), 'cements' => $w->sum('cement')];
    }


    public function plans()
    {
        return $this->hasOne('App\Plan', 'plan_id', 'id');
    }

}
