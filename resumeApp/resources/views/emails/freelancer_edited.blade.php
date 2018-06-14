@extends('layouts.email')

@section('content')
    <div class="greeting">Hello Mr.Admin!</div>
    <hr>
    <div class="mailText">
        Please note that, <br>
        User <b>{{auth()->user()->firstName}} {{auth()->user()->lastName}}</b> has updated his profile !
    </div>
    <div class="buttonMain col-md-4 offset-4">
        <a href="123workforce.magictimeapps.com/{{auth()->user()->username}}"; class="hireBtn btn-block" target="_blank">View Resume</a>
    </div>
@endsection

