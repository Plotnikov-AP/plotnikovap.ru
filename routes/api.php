<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\ChatLikeController;
use App\Http\Controllers\MessageLikeController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/count', [CounterController::class, 'getAllCount']);
Route::post('/chat/like', [ChatLikeController::class, 'apiSetChatLike']);                                
Route::post('/chat/like/count/{id_chat}', [ChatLikeController::class, 'apiGetChatLikeCountYesNo']);
Route::post('/message/like', [MessageLikeController::class, 'apiSetMessageLike']);                                  
Route::post('/message/like/count/{id_message}', [MessageLikeController::class, 'apiGetMessageLikeCountYesNo']);


