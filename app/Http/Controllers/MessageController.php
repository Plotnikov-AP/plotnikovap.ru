<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function add_message(Request $request) {                               
    // print_r($_POST);                                                       
    //валидация полученных данных                                             
    $validated = $request->validate([                                         
        'id_chat' => ['required'],                                            
        'author'=> ['required'],                                              
        'message' => ['required']                                     
    ]);                                                                       
    //валидация пройдена, записываем в БД                                     
    // print_r($validated);                                                   
    $message=new Message();                                                   
    $message->id_chat=$validated['id_chat'];                                  
    $message->author=htmlspecialchars($validated['author']);                  
    $message->message=htmlspecialchars($validated['message']);
    $message->save();                                                         
    // //вернемся на страницу с комментариями                                 
    return redirect()->route('chat', ['id'=>$message->id_chat]);              
}                                                                             
                                                                              
public function del_message($id) {                                            
    print_r($_POST);                                                          
    $id_chat=$_POST['id_chat'];                                               
    $comment=DB::table('comments')                                            
    ->where('id', '=', $id)                                                   
    ->delete();                                                               
    return redirect()->route('chat', ['id'=>$id_chat]);                       
}                                                                             

}
