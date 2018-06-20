<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Events\MessagePosted;
use App\Message;
use App\User;
use App\Visitor;
use Illuminate\Http\Request;
class ChatController extends Controller
{
    protected $user ;
    protected $var_id;
    protected $conversation;

    public function getMessages(){
        $this->setCurrentUser();
        if(!empty(session()->get('conversation_id'))){
            $messages = Message::where('conversation_id',session()->get('conversation_id'))->get();
        }else{
            $messages = Message::where('conversation_id',$this->conversation->id)->get();
        }
        foreach ($messages as &$message){
            $message['user']   = User::where('id',$message->user_id)->first();
            $message['visitor']= Visitor::where('id',$message->visitor_id)->first();
        }
        return $messages;
    }

    public function showChatRoom(){
        return view('chat');
    }

    public function showAdminChatRoom($id){
        session()->put('conversation_id',$id);
        return view('chat');
    }


    public function storeMessages(Request $request){
        $this->setCurrentUser();
        $message                  = new Message;
        $message->message         = $request->message;
        if(isset($this->conversation->id)){
            $message->conversation_id = $this->conversation->id; // visitor
        }else{
            $message->conversation_id =  session()->get('conversation_id'); // admin
        }
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
            }else{
                // our user !
                if(!empty(session()->get('userConversationId'))){
                    $this->conversation = Conversation::where('id',session()->get('userConversationId'))->first();
                }else{
                    $userConversation = new Conversation;
                    $userConversation->user_id = $user->id;
                    $userConversation->save();
                    session()->put('userConversationId',$userConversation->id);
                    $this->conversation = $userConversation;
                }
            }

            $this->user   = $user;
            $this->var_id = 'user_id';

        }else{ // a visitor
            $token = session()->get('visitToken');
            if(!empty($token)){
                $visitor = Visitor::where('token',$token)->first();
                $this->conversation = Conversation::where('visitor_id',$visitor->id)->first();
            }else{
               $visitor = $this->createNewVisitor();
                // save token in session
                session()->put('visitToken',$visitor->token);
            }
            $this->user    = $visitor;
            $this->var_id  = 'visitor_id';
        }
    }

    public function createNewVisitor(){
        $visitor = new Visitor;
        $visitor->firstName = 'Visitor';
        $visitor->token = str_random(16);
        $visitor->save();
        $visitor->firstName = 'Visitor.'.$visitor->id;
        $visitor->save();

        $conversation = new Conversation;
        $conversation->visitor_id = $visitor->id;
        $conversation->save();
        $this->conversation = $conversation;

        return $visitor;
    }
}
