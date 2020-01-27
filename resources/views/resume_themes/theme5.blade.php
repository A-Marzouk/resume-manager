@extends('freelancer.layouts.theme_frame')

@section('content')
    <div id="resumeTheme5" class="d-flex justify-content-center">
        <resume-theme-5 :user="{{$freelancer}}" page="resume"></resume-theme-5>
    </div>
@endsection
