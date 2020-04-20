<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    //
    protected $table = 'chats';

    protected $fillable = ['user_id'];

    protected $with = ['user', 'lastMessage'];

    protected $hidden = ['user_id'];

    // protected $appends = ['last_message'];

    public function messages(){
        return $this->hasMany('App\ChatMessage', 'chat_id', 'id');
    }

    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function lastMessage(){
        return $this->hasOne('App\ChatMessage', 'chat_id', 'id')->latest()->without('author');
    }
}
