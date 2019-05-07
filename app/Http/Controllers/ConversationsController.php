<?php

namespace App\Http\Controllers;

use App\Conversation;
use Illuminate\Http\Request;

class ConversationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function deleteConversation($id){
        // we will delete the messages in this conversation and keep it, not to show it
        $conversation = Conversation::where('id',$id)->first();
        $messages = $conversation->messages;
        foreach ($messages as $message){
            $message->delete();
        }
        return redirect()->back()->with('successMessage','Conversation has been deleted !');
    }
}
