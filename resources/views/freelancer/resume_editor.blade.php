@extends('freelancer.layouts.freelancer_frame')

@section('content')

    <div id="freelancerResumeEditor" class="d-flex justify-content-center">
        <freelancer-resume-editor :user="{{$agent}}"></freelancer-resume-editor>
    </div>


@endsection
