<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getMessages(){
        return Message::with('user')->get();
    }

    public function showChatRoom(){
        return view('chat');
    }

    public function storeMessages(Request $request){
        $user = Auth::user();
        if($user){
            $message_user_id = $user->id;
        }else{
            $message_user_id = 'unknown';
        }
        $message = new Message;
        $message->message = $request->message;
        $message->user_id = $message_user_id;
        $message->save();

        return [
            'status' => 'ok'
        ];
    }
}
