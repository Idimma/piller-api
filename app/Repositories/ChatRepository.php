<?php

namespace App\Repositories;

use App\Chat;
use App\Repositories\BaseRepository;

class ChatRepository extends BaseRepository
{
    private $chat;
    public function __construct(Chat $chat)
    {
        $this->chat = $chat;
        parent::__construct($chat);
    }

    public function getLatestChat(int $count){
        return $this->chat->paginate($count)->sortByDesc('lastMessage.created_at');
    }
}