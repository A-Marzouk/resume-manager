@extends('freelancer.layouts.theme_frame')

@section('content')
    <div id="resumeTheme2" class="d-flex justify-content-center">
        <resume-theme-2 :user="{{$agent}}" page="resume"></resume-theme-2>
    </div>
@endsection
