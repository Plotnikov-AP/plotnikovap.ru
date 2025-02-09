<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Chat;
use App\Http\Controllers\ChatLikeController;



class ChatController extends Controller
{
    public function chats() {                                              
        if (Auth::user()->email==Config::get('myconfig.admin_mail')) {     
            $chats=Chat::all();                                            
        } else {                                                           
            $chats=DB::table('chats')                                      
            ->where('access', '=', '1')                                    
            ->orwhere('author', '=', Auth::user()->name)                   
            ->get();                                                       
        }                                                                  
        // print_r($chats);
        //добавим в массив кол-во like yes no
        foreach ($chats as $key=>$chat) {
            $chats[$key]->yes=ChatLikeController::getChatLike($chat->id, 'yes');                                                                            
            $chats[$key]->no=ChatLikeController::getChatLike($chat->id, 'no');   
        }
        // print_r($chats);                                               
        //для каждого чата создаем массив всего сообщений и новых сообщений
        foreach ($chats as $key=>$chat) {
            $id_user=Auth::user()->id;                                     
            $id_chat=$chat->id;
            $id_chat_count=DB::table('messages')                 
            ->where('id_chat', '=', $id_chat)                              
            ->count();
            $chats[$key]->count=$id_chat_count; 
        }
        
        // foreach ($chats as $key=>$chat) {                                  
        //     $id_user=Auth::user()->id;                                     
        //     $id_chat=$chat->id;                                            
            //всего сообщений в этом чате                                  
            // $id_chat_count=$comments=DB::table('comments')                 
            // ->where('id_chat', '=', $id_chat)                              
            // ->count();                                                     
            //найдем из БД, сколько было в прошллое посещение чата.        
            // $id_chat_viewed=DB::table('comment_all_news')                  
            // ->select('viewed')                                             
            // ->where('id_user', '=', $id_user)                              
            // ->where('id_chat', '=', $id_chat)                              
            // ->first()->viewed?? 0;                                         
            // echo "id_user=$id_user";                                    
            // echo "id_chat=$id_chat";                                    
            // echo "id_chat_all_count=$id_chat_count";                    
            // echo "id_chat_viewed=$id_chat_viewed";                      
            // echo '<br />';                                              
            // $chats[$key]->count=$id_chat_count;                            
            // $chats[$key]->viewed=$id_chat_count-$id_chat_viewed;           
        // }                                                                  
        return view('my-chats', ['chats'=>$chats]);                           
    }

    public function add_chat(Request $request) {                         
        // print_r($_POST);                                              
        //валидация полученных данных                                    
        $validated = $request->validate([
            'author'=> 'required',                                
            'theme' => 'required|unique:App\Models\Chat',
            'access' => 'required|in:0,1',                             
        ]);                                                              
        //валидация пройдена, записываем в БД                            
        // print_r($validated);                                          
        $chat=new Chat();                                                
        $chat->author=htmlspecialchars($validated['author']);            
        $chat->theme=htmlspecialchars($validated['theme']);
        $chat->access=$validated['access'];                              
        $chat->save();                                                   
        //вернемся на страницу с чатами                                  
        return redirect()->route('chats');                               
    }

    public function chat($id) {                                                                                                     
        $chat=Chat::find($id);                                                                                                      
        $messages=DB::table('messages')                                                                                             
        ->where('id_chat', '=', $id)                                                                                                
        ->get();
        $chat->count=count($messages);                                                                                                                    
        // //запишем в БД                                                                                                              
        // $commentallnews=new CommentAllNew();                                                                                        
        // $commentallnews->id_user=Auth::user()->id;                                                                                  
        // $commentallnews->id_chat=$id;                                                                                               
        // $commentallnews->viewed=$count;                                                                                             
        // $commentallnews->save();                                                                                                    
        // //здесь нужно обработать результат и если данные не записаны, записать в лог                                                
        // //посчитаем like (yes mo) на странице                                                                                       
        $chat['yes']=ChatLikeController::getChatLike($id, 'yes');                                                                            
        $chat['no']=ChatLikeController::getChatLike($id, 'no');                                                                              
        // //для каждого сообщения нужно посчитать like yes no                                                                       
        foreach ($messages as $key=>$message) {                                                                                     
            $messages[$key]->yes=MessageLikeController::getMessageLike($message->id, 'yes');                                      
            $messages[$key]->no=MessageLikeController::getMessageLike($message->id, 'no');                                        
        }                                                                                                                           
        // print_r($messages);                                                                                                      
        return view('my-chat', ['chat'=>$chat, 'messages' => $messages]);
    }                                                                                                                               
}
