<?php

namespace App\Services;

use App\Repositories\ChatRepository;
use App\Notifications\NewMessage;
use App\Events\{NewMessage as MessageEvent, NewUserChatEvent};
use App\Services\{UserService, ExpoNotification};
use Notification;

class ChatService
{
    private $chat;

    public function __construct(ChatRepository $chat, UserService $user)
    {
        $this->chat = $chat;
        $this->user = $user;
    }

    public function sendChatMessage(array $data)
    {
        $user = getUser();
        $chat = $this->getUserChat($user->id);
        $message = $this->saveMessage($chat, $user->id, $data['message']);
        broadcast(new MessageEvent($message));
        broadcast(new NewUserChatEvent($user, $message));
        $admins = $this->user->getAdmins();
        Notification::send($admins, new NewMessage($message));
        return $message;
    }

    public function replyChatMessage($data)
    {
        $chat = $this->chat->get($data['id']);
        $user = getUser();
        $receiver = $chat->user;
        $message = $this->saveMessage($chat, $user->id, $data['message']);
        broadcast(new NewUserChatEvent($receiver, $message));
        ExpoNotification::sendNotification("ExponentPushToken[$receiver->expo_token]", 'New Message', $message->message, $message->toArray());
        return $message;
    }

    public function getAllChat($per_page = 20)
    {
        return $this->chat->getLatestChat($per_page);
    }

    public function getChatMessages(int $id, Int $per_page = 20)
    {
        $chat = $this->chat->get($id);
        return $chat->messages()->latest()->paginate($per_page)->groupBy(function ($item) {
            return $item->created_at->format('d-M-Y');
        });
    }

    private function getUserChat(Int $user_id)
    {
        return $this->chat->firstOrCreate(['user_id' => $user_id]);
    }

    private function saveMessage(Object $chat, Int $sender_id, $message)
    {
        return $chat->messages()->create([
            'sender_id' => $sender_id,
            'message' => $message,
        ]);
    }
}
