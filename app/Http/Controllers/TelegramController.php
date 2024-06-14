<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TelegramService;
use Log;

class TelegramController extends Controller
{
    protected $telegramService;

    public function __construct(TelegramService $telegramService)
    {
        $this->telegramService = $telegramService;
    }

    public function webhook(Request $request)
    {
             
        $message = $request->input('message.text');
        $chatId = $request->input('message.chat.id');

        if ($message == '/start') {
            $this->telegramService->sendMessage($chatId, 'Welcome to our bot!');
        } else {
            $this->telegramService->sendMessage($chatId, 'Response: ' . $message);
        }

        return response()->json(['status' => 'ok']);
    }
    
    public function sendPostToTelegram(Request $request)
    {
        

        $postId = $request->input('id');
        $title = $request->input('title');
        $body = $request->input('body');

        $message = "Post ID: $postId\nTitle: $title\nBody: $body";
        $chatId = env('TELEGRAM_CHAT_ID'); 

        $this->telegramService->sendMessage($chatId, $message);

        return response()->json(['status' => 'Message sent to Telegram']);
    }
}
