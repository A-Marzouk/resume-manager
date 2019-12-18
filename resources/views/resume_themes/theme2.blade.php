@extends('freelancer.layouts.freelancer_frame')

@section('content')
    {{--<div id="freelancerResumeLongV2" class="d-flex justify-content-center">--}}
    {{--<freelancer-resume-long-v2 :freelancer="{{$freelancer}}"></freelancer-resume-long-v2>--}}
    {{--</div>--}}

    <div id="resumeTheme2" class="d-flex justify-content-center">
        <resume-theme-2 :freelancer="{{$freelancer}}" page="resume"></resume-theme-2>
    </div>

@endsection
