<?php
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\TelegramController;
use App\Http\Controllers\PostController;

Route::post('/telegram/webhook', [TelegramController::class, 'webhook']);
Route::post('/send-post-to-telegram', [TelegramController::class, 'sendPostToTelegram']);
Route::get('/', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);

