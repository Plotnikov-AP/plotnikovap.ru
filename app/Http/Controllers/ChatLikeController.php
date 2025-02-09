<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatLike;
use Illuminate\Support\Facades\DB;

class ChatLikeController extends Controller
{

    public static function getChatLike($id_chat, $str) {                                             
        switch ($str) {                                                                                
            case 'yes':                                                                                
                return ChatLike::where('id_chat', '=', $id_chat)                                       
                ->where('yes', '=', 1)                                                                 
                ->count();                                                                             
                break;                                                                                 
            case 'no':                                                                                 
                return ChatLike::where('id_chat', '=', $id_chat)                                       
                ->where('no', '=', 1)                                                                  
                ->count();                                                                             
                break;                                                                                 
            default: throw new Exception('В функцию getChatLike поданы некорректные входные данные');
                                                                                                    
        }
    }

    public function apiSetChatLike(Request $request) {
        // print_r($request->post());
        //валидация полученных данных
        $validated = $request->validate([
            'data.id_chat' => 'required|numeric',
            'data.id_user'=> 'required|numeric',
            'data.yes' => 'required|boolean',
            'data.no' => 'required|boolean'
        ]);
        // print_r($validated);
        $id=DB::table('chat_likes')                              
        ->select('id')                                              
        ->where('id_chat', '=', $validated['data']['id_chat'])      
        ->where('id_user', '=', $validated['data']['id_user'])      
        ->first()->id?? 0;                                          
        if (!$id) {                                                 
            $id=ChatLike::all()->count();                        
            $id++;                                                  
        }                                                           
        $result=DB::table('chat_likes')
        ->upsert(
            [
                ['id' => $id, 'id_chat' => $validated['data']['id_chat'], 'id_user' => $validated['data']['id_user'], 'yes' => $validated['data']['yes'], 'no' => $validated['data']['no']]
            ],
            ['id'],
            ['yes', 'no']
        );
    }

    public static function apiGetChatLikeCountYesNo($id_chat) {
        $yes=self::getChatLike($id_chat, 'yes');
        $no=self::getChatLike($id_chat, 'no');
        return [$yes, $no];
    }
}
