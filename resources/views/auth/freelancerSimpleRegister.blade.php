@extends('freelancer.layouts.freelancer_frame')

@section('content')

    <div id="freelancerSimpleRegisterComponent">
        <freelancer-simple-register :referral_code="{{$referral_code}}"></freelancer-simple-register>
    </div>

@endsection
