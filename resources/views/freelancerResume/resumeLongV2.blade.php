@extends('freelancer.layouts.freelancer_frame')

@section('content')
    {{--<div id="freelancerResumeLongV2" class="d-flex justify-content-center">--}}
        {{--<freelancer-resume-long-v2 :freelancer="{{$freelancer}}"></freelancer-resume-long-v2>--}}
    {{--</div>--}}

    <div id="freelancerPortfolio" class="d-flex justify-content-center">
        <freelancer-portfolio :freelancer="{{$freelancer}}" page="resume"></freelancer-portfolio>
    </div>

@endsection
