<?php

namespace App\Http\Controllers;

use App\classes\Upload;
use App\Client;
use App\Conversation;
use App\Events\ConversationStarted;
use App\Events\MessageSent;
use App\Events\UpdateMessageCount;
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
        else{
            return redirect(route('welcome'));

        }
    }


    public function addMessage(Request $request){
        if(isset($request->message) && isset($request->conversation_id)){
            $conversation = Conversation::where('id',$request->conversation_id)->first();

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
            // dispatch the event :
            broadcast(new MessageSent($message))->toOthers();

            // update main unread messages count :
            broadcast(new UpdateMessageCount($message,$conversation->client_id,$conversation->user_id))->toOthers();

            // update the un read messages on the conversation
            if($currClient){ // message from client
                $conversation->unread_messages_freelancer = $conversation->unread_messages_freelancer+1;
            }elseif($currUser){ // message from user
                $conversation->unread_messages_client= $conversation->unread_messages_client+1;
            }
            $conversation->save();

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
            if(!isset($conversation->user_id) || !isset($conversation->client_id)){
                continue;
            }
            $firstParticipant  = User::where('id',$conversation->user_id)->first();
            $secondParticipant = Client::where('id',$conversation->client_id)->first();
            $data[$i]['conversation'] = $conversation ;
            $data[$i]['freelancer']   = $firstParticipant ;
            $data[$i]['freelancer']['userData']   = $firstParticipant->userData;
            $data[$i]['client']       = $secondParticipant ;
            $i++;
        }
        return $data;
    }

    public function getMessagesByConversationID($conversation_id){
        $conversation = Conversation::where('id',$conversation_id)->first();
        return $conversation->messages;
    }

    public function zeroUnread(Request $request){
        $conversation = Conversation::where('id',$request->conversation_id)->first();
        if($request->client_id){
            $conversation->unread_messages_client = 0;
        }
        elseif($request->user_id){
            $conversation->unread_messages_freelancer = 0;
        }

        $conversation->save();
    }

    public function startConversation(Request $request){
        $currClient = auth()->guard('client')->user();
        if(!$currClient){
            return redirect()->back()->with('errorMessage','You need to log in first.');
        }

        $conversation = Conversation::where([
            'user_id' => $request->freelancer_id,
            'client_id'=>$currClient->id
        ])->first();

        if($conversation){
            $conversation->updated_at = date('Y-m-d H:i:s',time());
            $conversation->save();
            return redirect(route('chat-room'));
        }

        if(!$conversation){
            $conversation = new Conversation;
            $conversation->user_id   = $request->freelancer_id;
            $conversation->client_id = $currClient->id;
            $conversation->save();
            // give event that a new conversation has started !
            broadcast(new ConversationStarted($conversation))->toOthers();
            return redirect(route('chat-room'));
        }

        return redirect()->back();
    }

    public function handleFileMessage(Request $request){
        if(isset($request->shared_file)){
            return Upload::chatFile('','shared_file','');
        }
    }

    public function getUnreadMessagesClient($client_id){
        $client = Client::where('id',$client_id)->first();
        $data = [
            'unread_messages_client' => $client->unreadMessages(),
        ];

        return $data;
    }

    public function getUnreadMessagesUser($user_id){
        $user   = User::where('id',$user_id)->first();
        $data = [
            'unread_messages_freelancer' => $user->unreadMessages()
        ];

        return $data;
    }
}
