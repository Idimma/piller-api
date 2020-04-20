<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    //
    protected $table = 'chat_messages';

    protected $fillable = ['sender_id', 'chat_id', 'message'];

    protected $with = ['author'];

    protected $hidden = ['sender_id'];

    public function author(){
        return $this->hasOne('App\User', 'id', 'sender_id');
    }

    public function chat(){
        return $this->hasOne('App\Chat', 'id', 'chat_id');
    }
}
