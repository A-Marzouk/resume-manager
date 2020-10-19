@extends('layouts.email')
@section('content')
    <div class="greeting" >Hello !</div>

    <div class="mailText">
        We have some new jobs that might interest you.
    </div>
    <div class="buttonMain col-md-4 offset-4" style="padding-top: 15px;">
        <a href="{{$jobPostLink}}" class="hireBtn btn-block" target="_blank">
            View & Apply
        </a>
    </div>
    <br/>
    <br/>
    <br/>

    <div class="mailText">
        Kindest Regards,<br/><b>123 Workforce</b>
    </div>
@endsection

