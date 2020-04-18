<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    //
    protected $table = 'chat_messages';

    protected $fillable = ['sender_id', 'chat_id', 'message'];


    public function author(){
        return $this->hasOne('App\User', 'sender_id', 'id');
    }

    public function chat(){
        return $this->hasOne('App\Chat', 'chat_id', 'id');
    }
}
