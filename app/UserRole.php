<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    //
    protected $table="user_roles";

    protected $fillable = ['user_id', 'role_id'];


    public function queryByRole(int $id){
        return $this->where('role_id', $id);
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function role(){
        return $this->belongsTo('App\User', 'role_id', 'id');
    }

    public function usersByRole(int $id, int $count){
        return $this->queryByRole($id)->with('user')->paginate($count)->pluck('user');
    }

    public function newUsers()
    {
        return $this->user()->dateBetween();
    }

}
