@extends('layouts.email')

@section('content')
    <div class="greeting">Hello Admin!</div>
    <hr>
    <div class="mailText">
        A new message sent to a designer,<br/><br/>
        To : {{$freelancer->firstName}} {{$freelancer->lastName}}<br/>
        From : {{$sentMessage->name}}, <br/>
        <br/><br/>
        Sender Email : {{$sentMessage->email}} <br/>
        Message Body : <br/>{{$sentMessage->body}} <br/>
    </div>
    <div class="buttonMain col-md-4 offset-md-4" style="text-align: center;">
        <a href="123workforce.magictimeapps.com/{{$freelancer->username}}"; class="hireBtn btn-block" target="_blank">View designer's resume</a>
    </div>
@endsection

