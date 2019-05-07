@extends('layouts.email')

@section('content')
    <div class="greeting" >Hello!</div>
    <hr>
    <div class="mailText">
        You have been provisionally selected to work for {{$clientName}} <br/>

        On these dates and times. <br/>

        Date : {{$weekDate}}<br/>
        Time : {{$hours}} Hours<br/>
        Days : {{$days}} <br/>

        Service : {{$title}}


    </div>
    <br/>
    <div class="mailText">
        Kindest Regards,<br/><b>123 Workforce</b>
    </div>
@endsection