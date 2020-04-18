<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    //
    protected $table = 'chats';

    protected $fillable = ['user_id'];

    public function messages(){
        return $this->hasMany('App\ChatMessage', 'chat_id', 'id');
    }
}
