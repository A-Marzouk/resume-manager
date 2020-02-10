@extends('freelancer.layouts.freelancer_frame')

@section('content')
    <div id="resumeTheme6" class="d-flex justify-content-center w-100">
        <resume-theme-6 :freelancer="{{$agent}}" page="resume" class="w-100"></resume-theme-6>
    </div>
@endsection
