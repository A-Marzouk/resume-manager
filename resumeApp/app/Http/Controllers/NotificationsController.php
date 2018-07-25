<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 6/6/2018
 * Time: 12:41 AM
 */

namespace App\Http\Controllers;
use App\classes\Telegram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotificationsController extends Controller
{
    private $mailingList = [
        'shey@123workforce.com',
        'AhmedMarzouk266@gmail.com',
        'riz@123workforce.com',
        'conor@123workforce.com',
    ];

    public function resumeEditedEmail(){
        $emails = $this->mailingList;
        Mail::send('emails.freelancer_edited', ['key' => 'value'], function($message) use ($emails)
        {
            $message->to($emails)->subject('User has updated resume !');
        });
    }

    public function messageToAdminMail($userMessage){
        $emails = ['AhmedMarzouk266@gmail.com','conor@123workforce.com'];
        $data  = [
            'userMessage' => $userMessage->message,
            'conversation_id' => $userMessage->conversation_id,
        ];
        Mail::send('emails.newMessage',$data, function($message) use ($emails)
        {
            $message->to($emails)->subject('New Message to live-chat !');
        });
    }

    public function resumeEditedTelegram(){
        $msg = auth()->user()->username ;
        $msg .= ' has updated his resume .. please view updated resume here..  ';
        $msg .= 'https://123workforce.com/'.auth()->user()->username;
        $telegram = new Telegram('-279372621');
        $telegram->sendMessage($msg);
    }

    public function liveChatTelegram($conversationID,$msg){
        $message  = 'Hi, a new message to live-chat : ';
        $message .=  ' " '.$msg.' "' ;
        $message .=  ' To open conversation and reply now please click on this link :' ;
        $message .=  ' ( https://123workforce.com/chat/'.$conversationID ;
        $message .= ') Thank you..' ;
        $telegram = new Telegram('-228260999');
        $telegram->sendMessage($message);
    }

    public function freelancerRegisteredEmail($data){
        $emails = $this->mailingList;
        Mail::send('emails.freelancer_registered',$data, function($message) use ($emails)
        {
            $message->to($emails)->subject('New freelancer on board!');
        });
    }

    public function freelancerWelcomeEmail($data){
        $emails = $this->mailingList;
        Mail::send('emails.freelancer_welcome',$data, function($message) use ($emails,$data)
        {
            $message->to($data['email'])->subject('Welcome to 123 Workforce');
        });
    }

    // clients :

    public function clientRegisteredEmail($data){
        $emails = $this->mailingList;
        Mail::send('emails.client_registered',$data, function($message) use ($emails)
        {
            $message->to($emails)->subject('New client on board!');
        });
    }


    // message to sales :

    public function messageToSales(Request $request){
        $emails = [$request->email,'AhmedMarzouk266@gmail.com','conor@123workforce.com'];
        $data = [
            'subject' => $request->subject,
            'messageBody' => trim($request->message),
            'email' => $request->email
        ];

        Mail::send('emails.message_to_sales',$data, function($message) use ($emails)
        {
            $message->to($emails)->subject('Message to sales');
        });

        return redirect('/')->with('successMessage', 'Thank you, your message has been sent.');
    }


    // message to freelancer ( from resume page ) :
    public function messageToFreelancer(Request $request){
        $emails          = $this->mailingList;
        $freelancerEmail = $request->freelancerEmail;

        $data = [
            'subject' => $request->subject,
            'messageBody' => trim($request->message),
            'email' => $request->email,
            'name' => $request->name,
            'freelancerResumeLink'=>$request->freelancerResumeLink,
            'freelancerEmail'=>$freelancerEmail
        ];

        Mail::send('emails.message_to_freelancer_admins',$data, function($message) use ($freelancerEmail)
        {
            $message->to($freelancerEmail)->subject('Client sent message to freelancer.');
        });

        Mail::send('emails.message_to_freelancer',$data, function($message) use ($emails)
        {
            $message->to($emails)->subject('Message from 123 workforce clint.');
        });

        return redirect()->back()->with('successMessage', 'Thank you, your message has been sent.');

    }

}