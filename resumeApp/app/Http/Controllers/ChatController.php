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
    protected $var_id;

    public function getMessages(){
        return Message::with('user','visitor')->get();
    }

    public function showChatRoom(){
        return view('chat');
    }

    public function storeMessages(Request $request){
        $this->setCurrentUser();

        $message                  = new Message;
        $message->message         = $request->message;
        $message->{$this->var_id} = $this->user->id;

        $message->save();

        // trigger an event to announce that a message has been posted !

        event(new MessagePosted($message,$this->user));

        return [
            'status' => 'ok'
        ];
    }

    public function setCurrentUser(){
        $user = auth()->user();
        if($user){
            if($user->admin == 1){
                $user = User::where('username','admin_workforce')->first();
            }
            $this->user   = $user;
            $this->var_id = 'user_id';
        }else{ // a visitor
            $token = session()->get('visitToken2');
            if(!empty($token)){
                $visitor = Visitor::where('token',$token)->first() ;
            }else{
               $visitor = $this->createNewVisitor();
                // save token in session
                session()->put('visitToken2',$visitor->token);
            }
            $this->user   = $visitor;
            $this->var_id = 'visitor_id';
        }
    }

    public function createNewVisitor(){
        $visitor = new Visitor;
        $visitor->firstName = 'Visitor';
        $visitor->token = str_random(16);
        $visitor->save();
        $visitor->firstName = 'Visitor.'.$visitor->id;
        $visitor->save();

        return $visitor;
    }
}
