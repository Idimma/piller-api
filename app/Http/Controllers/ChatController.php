<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ChatService;
use Illuminate\Support\Facades\{Validator};

class ChatController extends Controller
{
    private $chat;
    //
    public function __construct(ChatService $chat)
    {
        $this->chat = $chat;
    }


    public function getMessages(){
        $user = getUser();
        $chat_messages = $user->chatMessages;
        return $this->respondWithSuccess($chat_messages, 200);
    }

    public function sendMessage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->respondWithError($validator->errors(), 400);
        }
        return $this->respondWithSuccess($this->chat->sendChatMessage($request->all()));
    }

}
