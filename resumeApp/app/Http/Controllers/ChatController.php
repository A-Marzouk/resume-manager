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
    protected $user ;

    public function getMessages(){
        return Message::with('user','visitor')->get();
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
            // if I have the session set so no need to new user, else make a new one !
            $token = session()->get('visitToken');
            if(!empty($token)){
                $visitor = Visitor::where('token',$token)->first() ;
                $message->visitor_id = $visitor->id;
                $user = $visitor;
            }else{
                $visitor = new Visitor;
                $visitor->firstName = 'Visitor';
                $visitor->token = str_random(16);
                $visitor->save();
                $visitor->firstName = 'Visitor.'.$visitor->id;
                $visitor->save();
                // save token in session
                session()->put('visitToken',$visitor->token);
                $message->visitor_id = $visitor->id;
                $user = $visitor;
            }

        }

        $message->save();

        // trigger an event to announce that a message has been posted !

        event(new MessagePosted($message,$user));

        return [
            'status' => 'ok'
        ];
    }
}
