@extends('layouts.email')

@section('content')
    <div class="mailText">
        <div class="greeting" >Hello!</div>
        <div class="mailText">
           Here are a list of all approved users :<br/><br/>
           @foreach($users as $user)
               Name : {{$user['firstName']}} {{$user['lastName']}}<br/>
               Email : {{$user['email']}}
                <hr>
           @endforeach
        </div>
        <br/>
        <div class="mailText">
            Kindest Regards,<br/><b>123 Workforce</b>
        </div>
    </div>
@endsection