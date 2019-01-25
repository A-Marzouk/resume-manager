<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 6/6/2018
 * Time: 12:41 AM
 */

namespace App\Http\Controllers;
use App\classes\Telegram;
use App\Client;
use App\ClientSearch;
use App\Recording;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotificationsController extends Controller
{
    private $mailingList = [
        'shey@123workforce.com',
        'AhmedMarzouk266@gmail.com',
        'conor@123workforce.com',
    ];

    public function resumeEditedEmail(){
        $emails = $this->mailingList;
        Mail::send('emails.freelancer_edited', ['key' => 'value'], function($message) use ($emails)
        {
            $message->to($emails)->subject('User has updated resume !');
        });
    }

    public function businessSupportApplication($data){
        $recording = Recording::where('user_id',$data['id'])->first();
        if (strpos($recording->src, 'drive.google.com') !== false) {
            // it is link from google.
            $data['recordLink'] = $recording->src;
        }else{
            $data['recordLink'] = '123workforce.magictimeapps.com'.$recording->src;
        }
        $emails = [
            '123@123workforce.com'
        ];
        Mail::send('emails.business_supprt_application',$data, function($message) use ($emails)
        {
            $message->to($emails)->subject('New application (Business support) !');
        });

        $telegram = new Telegram('-228260999');
        $msg      = "New Application has been submitted.\n" ;
        $msg     .= "Name : ". $data['firstName'] . " ". $data['lastName'];
        $msg     .= "\nEmail :". $data['email'];
        if($recording){
            $msg     .= "\nSrc : https://123workforce.com". $recording->src;

        }
        $telegram->sendMessage($msg);
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
        Mail::send('emails.freelancer_welcome',$data, function($message) use ($data)
        {
            $message->to($data['email'])->subject('Welcome to 123 Workforce');
        });
    }

    // clients :

    public function clientPaidEmail($data){
        $emails = $this->mailingList;
        Mail::send('emails.client_paid',$data, function($message) use ($data)
        {
            $message->to($data['email'])->subject('Freelancer is successfully booked');
        });

        Mail::send('emails.client_paid_admins',$data, function($message) use ($data,$emails)
        {
            $message->to($emails)->subject('Client has booked a freelancer');
        });

    }

    public function clientRegisteredEmail($data){
        $emails = $this->mailingList;
        Mail::send('emails.client_registered',$data, function($message) use ($emails)
        {
            $message->to($emails)->subject('New client on board!');
        });
    }

    public function affiliateRegisteredEmail($data){
        $emails = $this->mailingList;
        Mail::send('emails.affiliate_registered',$data, function($message) use ($emails)
        {
            $message->to($emails)->subject('New affiliate on board!');
        });
    }

    public function affiliateWelcomeEmail($data){
        $email = $data['affiliateEmail'];
        Mail::send('emails.affiliate_welcome',$data, function($message) use ($email)
        {
            $message->to($email)->subject('Welcome to 123 Workforce!');
        });
    }


    // message to sales :

    public function messageToSales(Request $request){
        $emails = ['AhmedMarzouk266@gmail.com','conor@123workforce.com','shey@123workforce.com'];
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
        $request->validate([
            'subject'=>'max:190',
            'email'=>'max:190',
            'name'=>'max:190',
            'message'=>'max:1500',
        ]);

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

        Mail::send('emails.message_to_freelancer_admins',$data, function($message) use ($emails)
        {
            $message->to($emails)->subject('Client sent message to freelancer.');
        });

        Mail::send('emails.message_to_freelancer',$data, function($message) use ($freelancerEmail)
        {
            $message->to($freelancerEmail)->subject('Message from 123 workforce client.');
        });

        return redirect()->back()->with('successMessage', 'Thank you, your message has been sent.');

    }

    public function mailSearchToClient(Request $request){
        $clientEmail = $request->client_email ;
        $search_id   = $request->search_id ;

        $clientName  = Client::where('email',$clientEmail)->first()->name;
        $searchName  = ClientSearch::where('id',$search_id)->first()->name;

        $mailData = [
            'clientName' => $clientName,
            'searchID' => $search_id,
            'searchName'=>$searchName
        ];
        Mail::send('emails.searchClient',$mailData, function($message) use ($clientEmail)
        {
            $message->to($clientEmail)->subject('A new search has been saved to your profile on 123 Workforce.');
        });
    }

    public function inviteFreelancersToJob($invitationData){
        $emails   = $invitationData['emails'];
        $jobTitle = $invitationData['jobTitle'];
        $data   = [
            'jobPostLink' => $invitationData['jobPostLink'],
        ];

        Mail::send('emails.invite_freelancer_to_job',$data, function($message) use ($emails,$jobTitle)
        {
            $message->to($emails)->subject('Invitation to Apply - '.$jobTitle);
        });
    }

}