<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
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



}
