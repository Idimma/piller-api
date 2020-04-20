<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ChatService;
use Illuminate\Support\Facades\{Validator};
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    private $chat;
    //
    public function __construct(ChatService $chat)
    {
        $this->chat = $chat;
    }


    public function getMessages()
    {
        $user = getUser();
        $chat_messages = $user->chatMessages()->latest()->paginate(20)->sortBy('created_at')->groupBy(function ($item) {
            return $item->created_at->format('d-M-Y');
        });
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

    public function getAllChat(Request $request)
    {
        $per_page = $request->get('perPage') ?? 20;
        return $this->respondWithSuccess($this->chat->getAllChat($per_page));
    }

    public function getSingleChatMessages(Int $id, Request $request)
    {
        $per_page = $request->get('perPage') ?? 20;
        return $this->respondWithSuccess($this->chat->getChatMessages($id));
    }

    public function sendReply(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->respondWithError($validator->errors(), 400);
        }
        return $this->respondWithSuccess($this->chat->replyChatMessage($request->all()));
    }
}
