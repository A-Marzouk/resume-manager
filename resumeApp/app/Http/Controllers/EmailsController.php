<?php

namespace App\Http\Controllers;


class EmailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function showSendEmailsPage(){
        return view('admin.send_emails');
    }



}
