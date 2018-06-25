<?php

namespace App\Http\Controllers;

use App\Client;
use App\Conversation;
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
    protected $conversation;

    public function getMessages($conv_id = ''){
        $this->setCurrentUser();
        if($conv_id !== ''){
            $messages = Message::where('conversation_id',$conv_id)->get();
        }else{
            $messages = Message::where('conversation_id',$this->conversation->id)->get();
        }
        foreach ($messages as &$message){
            $message['user']    = User::where('id',$message->user_id)->first();
            $message['visitor'] = Visitor::where('id',$message->visitor_id)->first();
            $message['client']  = Client::where('id',$message->client_id)->first();
        }
        return $messages;
    }

    public function showChatRoom(){
        if(session()->get('admin') == 'AdminWasHere'){
            return redirect('/admin');
        }
        return view('chat');
    }

    public function showAdminChatRoom($id){
        session()->put('conversation_id',$id);
        return view('chat');
    }

    public function storeMessageFromMail(Request $request){
        $message                  = new Message;
        $message->message         = $request->message;
        $message->conversation_id = $request->conversationID;
        $message->user_id         = 2; // admin
        $message->save();

        // trigger an event to announce that a message has been posted !
        event(new MessagePosted($message,$this->user));

        return redirect('/');

    }


    public function storeMessages(Request $request){
        $this->setCurrentUser();
        $message                  = new Message;
        $message->message         = $request->message;
        if(isset($this->conversation->id)){
            $message->conversation_id = $this->conversation->id; // visitor or client

            // send a message to telegram if it is the first message in conversation :
            $messages = $this->conversation->messages;
            if(count($messages) == 0){
                $notify = new NotificationsController;
                $notify->liveChatTelegram($this->conversation->id,$request->message);
            }

        }else{
            $pageUrl = $request->pageUrl;
            $urlArray = explode('/',$pageUrl);
            $conversationId = '';
            foreach ($urlArray as $page){
                if(is_numeric($page)){
                    $conversationId = $page;
                }
            }
            $message->conversation_id =  $conversationId ; // admin
        }
        $message->{$this->var_id} = $this->user->id;

        $message->save();

        // trigger an event to announce that a message has been posted !

        event(new MessagePosted($message,$this->user));

        // send notification to admin to reply :
        $notifyMail = new NotificationsController;
        $notifyMail->messageToAdminMail($message);

        return [
            'status' => 'ok'
        ];
    }

    public function setCurrentUser(){
        $user = auth()->user();
        $client = Auth::guard('client')->user();

        if($user){
            if($user->admin==1 || session()->get('admin') == 'AdminWasHere'){
                $user = User::where('username','admin_workforce')->first();
                $this->user   = $user;
                $this->var_id = 'user_id';
                // conversation ID is already set by session
            }
        }elseif($client){
            if(!empty(session()->get('clientConversationId'))){
                $this->conversation = Conversation::where('id',session()->get('clientConversationId'))->first();
            }else{
                // check if the client has a conversation before :
                $clientConversation = Conversation::where('client_id',$client->id)->first();
                if($clientConversation == null){
                    $clientConversation = new Conversation;
                    $clientConversation->client_id = $client->id;
                    $clientConversation->save();
                    session()->put('clientConversationId',$clientConversation->id);
                }
                $this->conversation = $clientConversation;
            }
            $this->user   = $client;
            $this->var_id = 'client_id';

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
