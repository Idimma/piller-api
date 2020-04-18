<?php

namespace App\Services;

use App\Chat;
use App\Notifications\NewMessage;
use App\Events\{NewMessage as MessageEvent, NewUserChatEvent};
use App\Services\{UserService, ExpoNotification};
use Notification;

class ChatService
{
    private $chat;

    public function __construct(Chat $chat, UserService $user)
    {
        $this->chat = $chat;
        $this->user = $user;
    }

    public function sendChatMessage(array $data)
    {
        $user = getUser();
        $message = $this->saveMessage($user->id, $user->id, $data['message']);
        broadcast(new MessageEvent($message));
        broadcast(new NewUserChatEvent($user, $message));
        $admins = $this->user->getAdmins();
        Notification::send($admins, new NewMessage($message));
        // ExpoNotification::sendNotification("ExponentPushToken[$user->expo_token]", 'New Message', $message->message, $message->toArray());
        return $message;
    }

    public function replyChatMessage()
    {
    }

    private function getUserChat(Int $user_id)
    {
        return Chat::firstOrCreate(['user_id' => $user_id]);
    }

    private function saveMessage(Int $user_id, Int $sender_id, $message)
    {
        $chat = $this->getUserChat($user_id);
        return $chat->messages()->create([
            'sender_id' => $sender_id,
            'message' => $message,
        ]);
    }
}
