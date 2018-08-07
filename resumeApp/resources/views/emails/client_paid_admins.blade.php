@extends('layouts.email')

@section('content')
    <div class="greeting" >Hello Admin, a freelancer has been booked</div>
    <hr>
    <div class="mailText">
        Client : <b>{{$clientName}}</b><br/><br/>
        Client mail : <b>{{$email}}</b><br/><br/>
        Freelancer: <b>{{$freelancerName}}</b><br/>
    </div>
    <br/>
    <div class="mailText">
        Kindest Regards,<br/><b>123 Workforce</b>
    </div>
@endsection