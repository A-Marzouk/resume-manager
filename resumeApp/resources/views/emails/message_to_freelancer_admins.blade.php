@extends('layouts.email')
@section('content')
    <div class="greeting" >Hello Admin, a new message sent to freelancer !</div>
    <hr>
    <div class="mailText">
        Subject : <b>{{$subject}}</b><br/><br/>
        Message : <b>{{$messageBody}}</b><br/><br>
        From (Client): <b>{{$name}}</b> {{ $email }}<br/>
        To (Freelancer): <b>{{$freelancerEmail}}</b><br/>
        Freelancer resume : <b><a href="123workforce.magictimeapps.com/{{$freelancerResumeLink}}">Open Resume</a></b><br/>
    </div>
    <br/>
    <div class="mailText">
        Kindest Regards,<br/><b>123 Workforce</b>
    </div>
@endsection

