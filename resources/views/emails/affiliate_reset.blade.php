@extends('layouts.email')

@section('content')
    <div class="greeting" >Hello !</div>
    <hr>
    <div class="mailText" >You are receiving this email because we received a password reset request for your account.</div>
    <div class="mailText">
        Please ignore this message if you have not requested password reset link
    </div>
    <div class="buttonMain col-md-4 offset-4">
        <a href="123workforce.magictimeapps.com/affiliate/password/reset/{{$token}}" class="hireBtn btn-block" target="_blank">
            Affiliate reset Password
        </a>
    </div>
    <br/>
    <div class="mailText">
        If you have problems with the above link please use this one : <br/>
        <a href="123workforce.magictimeapps.com/affiliate/password/reset/{{$token}}">123workforce.magictimeapps.com/affiliate/password/reset/{{$token}}</a>
    </div>
    <br/>
    <div class="mailText">
        Kindest Regards,<br/><b>123 Workforce</b>
    </div>

@endsection

