@extends('layouts.email')
@section('content')
    <div class="greeting" >Hello!</div>
    <hr>
    <div class="mailText">
        We have a new business support application,<br/>
        Name : <b>{{$firstName}} {{$lastName}}</b><br/>
    </div>
    <div class="buttonMain col-md-4 offset-4">
        <a href="{{$recordLink}}" class="hireBtn btn-block" target="_blank">
            Listen to record
        </a>
    </div>

    <div class="buttonMain col-md-4 offset-4">
        <a href="123workforce.magictimeapps.com/admin/{{$id}}" class="hireBtn btn-block" target="_blank">
            View profile
        </a>
    </div>

    <div class="buttonMain col-md-4 offset-4">
        <a href="{{$cv_src}}" class="hireBtn btn-block" target="_blank">
            Uploaded cv
        </a>
    </div>

    <br/>
    <div class="mailText">
        <br/><br/>
        Kindest Regards,<br/><b>123 Workforce</b>
    </div>
@endsection

