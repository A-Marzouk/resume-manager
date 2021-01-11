<?php

namespace App\Http\Controllers;

use App\Mail\ResumeMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('sendResumeMessage');
    }

    public function showSendEmailsPage(){
        return view('admin.send_emails');
    }

    public function sendCustomEmails(Request $request){

        $mailingList    = $request->mailingList;
        $emailTemplate  = $request->emailTemplate;
        $emailSubject   = $request->emailSubject;


        Mail::send('emails.'.$emailTemplate,[], function($message) use ($mailingList,$emailSubject)
        {
            $message->to($mailingList)->subject($emailSubject);
        });

        return 'Thank you, your message has been sent.';

    }

    public function getEmailTemplate(Request $request){
        $templateName = $request->templateName ;
        return view('emails.'.$templateName) ;
    }

    public function sendResumeMessage(Request $request){

        $emailData = [
            'header' => 'New message on resume.',
            'body' => $request->message['body'],
            'actionText' => 'Open resume',
            'actionURL' => $request->resumeURL,
            'footer' => '123workforce.com team.'
        ];

        $from = [
            'name' => $request->message['name'],
            'email' => $request->message['email']
        ];

        $to[] =   [
            'name' => '123workforce admin',
            'email' => 'conor@123workforce.com'
        ];

        $cc[] =  [
            'name' => 'Ahmed Marzouk - admin',
            'email' => 'ahmedmarzouk266@gmail.com'
        ];

        Mail::to($to)
            ->cc($cc)
            ->send(new ResumeMessage($emailData, $from));

        return ['status' => 'success'];
    }



}
