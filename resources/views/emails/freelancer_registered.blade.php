@extends('layouts.email')
@section('content')
    <div class="greeting" >Hello Admin !</div>
    <hr>
    <div class="mailText">
        We have a new freelancer on board :<br/>
        Name : <b>{{$firstName}} {{$lastName}}</b><br/>
        Profession : {{ $profession }}
    </div>
    <div class="buttonMain col-md-4 offset-md-4" style="text-align: center;">
        <a href="123workforce.magictimeapps.com/{{$username}}" class="hireBtn btn-block" target="_blank">
            View Resume
        </a>
    </div>
    <br/>
    <div class="mailText">
        Kindest Regards,<br/><b>123 Workforce</b>
    </div>
@endsection

