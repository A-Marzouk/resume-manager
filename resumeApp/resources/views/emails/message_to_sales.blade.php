@extends('layouts.email')
@section('content')
    <div class="greeting" >Hello Mr.Admin !</div>
    <hr>
    <div class="mailText">
        We have a new message to sales :<br/><br/>
        Subject : <b>{{$subject}}</b><br/><br/>
        Message : <b>{{$messageBody}}</b><br/><br>
        From : <b>{{$email}}</b><br/>
    </div>
    <br/>
    <div class="mailText">
        Kindest Regards,<br/><b>123 Workforce</b>
    </div>
@endsection

