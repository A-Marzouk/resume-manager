@extends('layouts.client-app')

@section('content')
    <div id="freelancerResumeDownload" class="d-flex justify-content-center">
        <freelancer-resume-download :freelancer="{{$freelancer}}"></freelancer-resume-download>
    </div>

@endsection
