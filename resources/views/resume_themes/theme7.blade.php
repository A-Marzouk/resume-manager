@extends('freelancer.layouts.theme_frame')

@section('content')
    <div id="resumeTheme7" class="d-flex justify-content-center w-100">
        <resume-theme-7 :freelancer="{{$freelancer}}" page="resume" class="w-100"></resume-theme-7>
    </div>
@endsection
