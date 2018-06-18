<?php

namespace App\Http\Controllers;

use App\Events\MessagePosted;
use App\Message;
use App\User;
use App\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function getMessages(){
        return Message::with('user')->get();
    }

    public function showChatRoom(){
        return view('chat');
    }

    public function storeMessages(Request $request){
        $user = auth()->user();
        $message = new Message;
        $message->message = $request->message;
        if($user){
            if($user->admin == 1){
                $user = User::where('username','admin_workforce')->first();
            }
            $message->user_id = $user->id;
        }else{
            $user = Visitor::find(1);
            $message->user_id = $user->id;
        }

        $message->save();

        // trigger an event to announce that a message has been posted !

        event(new MessagePosted($message,$user));

        return [
            'status' => 'ok'
        ];
    }
}
