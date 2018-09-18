@extends('layouts.email')

@section('content')
    <div class="mailText">
        Dear <b>{{$clientName}}</b>,<br/><br/>

        Thank you for choosing 123 Workforce to choose a freelancer for you.<br/>

        We look forward for a fun and professional engagement between you and <b>{{$freelancerName}}</b>. We believe that together, we are going to achieve a lot of success.<br/><br/>

        Please log in to your account or sign up with us to get started.<br/>
        <div class="buttonMain col-md-4 offset-md-4" style="text-align: center;">
            <a href="123workforce.magictimeapps.com/client/login" class="hireBtn btn-block" target="_blank">
                Log in
            </a>
        </div><br/><br/>

        Best wishes,<br/>

        The 123 Workforce Team<br/>

    </div>
@endsection