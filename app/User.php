<?php

namespace App;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Str;


class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password','image_url', 'phone', 'uuid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot()
    {
         parent::boot();
         self::creating(function($model){
             $model->uuid = Str::uuid()->toString();
         });
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function userTrip(){
        return $this->hasMany('App\Trip', 'id', 'user_id');
    }

    public function driverTrip(){
        return $this->hasMany('App\Trip', 'id', 'driver_id');
    }

    public function role(){
        return $this->hasOneThrough('App\Role', 'App\UserRole', 'user_id', 'id', 'id', 'role_id');
    }

    public function userrole(){
        return $this->hasOne('App\UserRole');
    }

    public function userdetail(){
        return $this->hasOne('App\UserDetail');
    }

    public function destination(){
        return $this->hasMany('App\UserLocation', 'id', 'user_id');
    }

    public function getUserByUuid(string $uuid){
        return $this->where('uuid', $uuid)->first();
    }

}
