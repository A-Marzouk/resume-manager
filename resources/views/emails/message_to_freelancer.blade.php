@extends('layouts.email')
@section('content')
    <div class="greeting" >Hello you have a new message from a client !</div>
    <hr>
    <div class="mailText">
        Subject : <b>{{$subject}}</b><br/><br/>
        Message : <b>{{$messageBody}}</b><br/><br>
        From : <b>{{$name}}</b> <br/>
    </div>
    <br/>
    <div class="mailText">
        Kindest Regards,<br/><b>123 Workforce</b>
    </div>
@endsection

