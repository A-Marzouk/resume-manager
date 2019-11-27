@extends('client.layouts.client_frame')

@section('content')

    <div id="clientRegister">
        <client-register referral_code="{{$referral_code}}"></client-register>
    </div>

@endsection
