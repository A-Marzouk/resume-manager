@extends('freelancer.layouts.theme_frame')

@section('content')
    <div id="resumeTheme4" class="d-flex justify-content-center">
        <resume-theme-4 :user="{{$freelancer}}" page="resume"></resume-theme-4>
    </div>
@endsection
