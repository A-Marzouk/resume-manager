@extends('freelancer.layouts.freelancer_frame')

@section('content')
    <div id="resumeTheme10" class="d-flex justify-content-center">
        <resume-theme-10 :user="{{$agent}}" page="resume"></resume-theme-10>
    </div>
@endsection
