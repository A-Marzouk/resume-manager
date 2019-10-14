@extends('freelancer.layouts.freelancer_frame')

@section('content')

    <div id="serviceAgreementFreelancer">
        <service-agreement :agent="{{currentAgent()}}" :user="{{currentAgent()->user}}"></service-agreement>
    </div>

@endsection
