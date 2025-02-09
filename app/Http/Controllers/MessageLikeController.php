<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MessageLike;

class MessageLikeController extends Controller
{
    public static function getMessageLike($id_message, $str) {
        switch ($str) {
            case 'yes':
                return MessageLike::where('id_message', '=', $id_message)
                ->where('yes', '=', 1)
                ->count();
                break;
            case 'no':
                return MessageLike::where('id_message', '=', $id_message)
                ->where('no', '=', 1)
                ->count();
                break;
            default: throw new Exception('В функцию getMessageLike поданы некорректные входные данные');

        }
    }

    public static function apiGetMessageLikeCountYesNo($id_message) {
        $yes=self::getMessageLike($id_message, 'yes');
        $no=self::getMessageLike($id_message, 'no');
        return [$yes, $no];
    }

    public function apiSetMessageLike(Request $request) {
        // print_r($request->post());
        //валидация полученных данных
        $validated = $request->validate([
            'data.id_chat' => 'required|numeric',
            'data.id_message' => 'required|numeric',
            'data.id_user'=> 'required|numeric',
            'data.yes' => 'required|boolean',
            'data.no' => 'required|boolean'
        ]);
        // print_r($validated);
        $id=DB::table('message_likes')
        ->select('id')
        ->where('id_chat', '=', $validated['data']['id_chat'])
        ->where('id_message', '=', $validated['data']['id_message'])
        ->where('id_user', '=', $validated['data']['id_user'])
        ->first()->id?? 0;
        if (!$id) {
            $id=MessageLike::all()->count();
            $id++;
        }
        $result=DB::table('message_likes')
        ->upsert(
            [
                ['id'=> $id, 'id_chat' => $validated['data']['id_chat'], 'id_message' => $validated['data']['id_message'], 'id_user' => $validated['data']['id_user'], 'yes' => $validated['data']['yes'], 'no' => $validated['data']['no']]
            ],
            ['id'],
            ['yes', 'no']
        );
    }
}
