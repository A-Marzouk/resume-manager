@extends('layouts.client-app')

@section('content')
    <div id="freelancerResumeShortV2" class="d-flex justify-content-center">
        <freelancer-resume-short-v2 :freelancer="{{$freelancer}}"></freelancer-resume-short-v2>
    </div>

@endsection