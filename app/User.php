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
        'first_name', 'last_name', 'email', 'password', 'image_url', 'phone', 'uuid', 'status', 'is_verified',
        'registration_type', 'country'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'id'
    ];

    protected $appends = ['avatar_url'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function getAvatarUrlAttribute(){
        $url = $this->image_url ?? '6.jpg';
        return config('app.url').'/avatar/'.$url;
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
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

    public function verificationToken(){
        return $this->hasOne('App\UserVerification', 'user_id', 'id');
    }

    public function userPlan()
    {
        return $this->hasMany('App\Plan', 'user_id', 'id');
    }

    public function driverPlan()
    {
        return $this->hasMany('App\Plan', 'driver_id', 'id');
    }

    public function hasActivePlan()
    {
        return $this->userPlan->whereIn('status_id', ['1', '2', '3'])->isNotEmpty();
    }

    public function getPendingPlan()
    {
        return $this->userPlan->whereIn('status_id', ['1', '2', '3'])->first();
    }

    public function availableDriver(){
        return $this->whereHas('userrole', function($q){
            return $q->where('role_id',2);
        })->whereDoesntHave('driverPlan', function($q){
            return $q->whereIn('status_id', ['1', '2', '3']);
        })->get();
    }

    public function role()
    {
        return $this->hasOneThrough('App\Role', 'App\UserRole', 'user_id', 'id', 'id', 'role_id');
    }

    public function userrole()
    {
        return $this->hasOne('App\UserRole');
    }

    public function chats(){
        return $this->hasOne('App\Chat');
    }

    public function chatMessages(){
        return $this->hasManyThrough('App\ChatMessage', 'App\Chat', 'user_id', 'chat_id', 'id', 'id');
    }

    public function userdetail()
    {
        return $this->hasOne('App\UserDetail');
    }

    public function destination()
    {
        return $this->hasMany('App\UserLocation', 'user_id', 'id');
    }

    public function getUserByUuid(string $uuid)
    {
        return $this->where('uuid', $uuid)->first();
    }

    public function cards()
    {
        return $this->hasMany('App\Card', 'user_id', 'id');
    }
    public function transactions()
    {
        return $this->hasMany('App\Transactions', 'user_id', 'id');
    }

    public function scopeActive($query, $status=1){
        return $query->where('is_verified', $status)->where('status', $status);
    }

    public function scopeDateBetween($query, $within = 1)
    {
        return $query->where('created_at', '>=', now()->subDays($within));
    }

    public function activeCard()
    {
        if($this->cards->where('default', 1)->isNotEmpty()){
            return $this->cards()->where('default', 1)->first();
        }
        return $this->cards()->first();
    }
}
