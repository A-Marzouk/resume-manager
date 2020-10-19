@extends('layouts.email')

@section('content')
    <div class="mailText">
        Dear <b>{{$clientName}}</b>,<br/><br/>

        I hope you're having a good day.<br/>

        You have a new saved search to your profile :

        <a href="123workforce.magictimeapps.com/search/{{$searchID}}">{{$searchName}}</a>

        Please log in to your account to see all saved searches.<br/>
        <div class="buttonMain col-md-4 offset-md-4" style="text-align: center;">
            <a href="123workforce.magictimeapps.com/client/login" class="hireBtn btn-block" target="_blank">
                Log in
            </a>
        </div><br/><br/>

        Best wishes,<br/>

        The 123 Workforce Team<br/>

    </div>
@endsection