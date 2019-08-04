@extends('layouts.client-app')

@section('content')
    <div id="freelancerResumeLongV2">
        <freelancer-resume-long-v2 :freelancer="{{$freelancer}}"></freelancer-resume-long-v2>
    </div>

@endsection