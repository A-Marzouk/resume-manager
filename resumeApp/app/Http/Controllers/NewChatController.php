<?php

namespace App\Http\Controllers;

use App\Client;
use App\Conversation;
use App\Message;
use App\User;
use Illuminate\Http\Request;

class NewChatController extends Controller
{

    public function showChatPage(){
        $currClient = auth()->guard('client')->user();
        $currUser   = auth()->user();
        if($currUser){
            return view('newChat.chat_user',compact('currUser','currClient'));
        }
        elseif($currClient){
            return view('newChat.chat_client',compact('currUser','currClient'));
        }
    }


    public function addMessage(Request $request){
        if(isset($request->message) && isset($request->conversation_id)){
            $message = new Message;
            $message->message         = $request->message;
            $message->conversation_id = $request->conversation_id;
            $currClient = auth()->guard('client')->user();
            $currUser   = auth()->user();
            if($currClient){
                $message->client_id = $currClient->id;
            }
            elseif ($currUser){
                $message->user_id = $currUser->id;
            }

            $message->save();

            return $message;
        }
    }

    public function getAuthorConversations(){
        $currClient = auth()->guard('client')->user();
        $currUser   = auth()->user();
        if($currClient){
            $conversations = $currClient->conversations;
        }
        elseif ($currUser){
            $conversations = $currUser->conversations;
        }
        $data=[];
        $i=0;
        foreach ($conversations as $conversation){
            $firstParticipant  = User::where('id',$conversation->user_id)->first();
            $secondParticipant = Client::where('id',$conversation->client_id)->first();
            $data[$i]['conversation'] = $conversation ;
            $data[$i]['freelancer']   = $firstParticipant ;
            $data[$i]['client']       = $secondParticipant ;
            $i++;
        }
        return $data;
    }

    public function getMessagesByConversationID($conversation_id){
        $conversation = Conversation::where('id',$conversation_id)->first();
        return $conversation->messages;
    }
}
