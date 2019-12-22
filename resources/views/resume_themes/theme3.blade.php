@extends('freelancer.layouts.freelancer_frame')

@section('content')
    <div id="resumeTheme3" class="d-flex justify-content-center">
        <resume-theme-3 :user="{{$freelancer}}" page="resume"></resume-theme-3>
    </div>
@endsection
