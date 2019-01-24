@extends('layouts.email')
@section('content')
    <div class="greeting" >Hello!</div>
    <hr>
    <div class="mailText">
        We have a new business support application,<br/>
        Name : <b>{{$firstName}} {{$lastName}}</b><br/>
    </div>
    <div class="buttonMain col-md-4 offset-4">
        <a href="#" class="hireBtn btn-block" target="_blank">
            Listen to record
        </a>
    </div>

    <div class="buttonMain col-md-4 offset-4">
        <a href="123workforce.magictimeapps.com/admin/{{$id}}" class="hireBtn btn-block" target="_blank">
            View profile from admin panel
        </a>
    </div>

    <br/>
    <div class="mailText">
        <br/><br/>
        Kindest Regards,<br/><b>123 Workforce</b>
    </div>
@endsection

