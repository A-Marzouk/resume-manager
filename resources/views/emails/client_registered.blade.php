@extends('layouts.email')
@section('content')
    <div class="greeting" >Hello Admin !</div>
    <hr>
    <div class="mailText">
        We have a new client on board :<br/>
        Name : <b>{{$name}}</b><br/>
    </div>
    <div class="buttonMain col-md-4 offset-4">
        <a href="123workforce.magictimeapps.com/admin/client/{{$id}}" class="hireBtn btn-block" target="_blank">
            View profile
        </a>
    </div>
    <br/>
    <div class="mailText">
        Kindest Regards,<br/><b>123 Workforce</b>
    </div>
@endsection

