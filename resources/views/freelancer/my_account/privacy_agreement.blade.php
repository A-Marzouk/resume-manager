@extends('freelancer.layouts.freelancer_frame')

@section('content')

    <div id="privacyAgreementFreelancer">
        <privacy-agreement :agent="{{currentAgent()}}" :user="{{currentAgent()->user}}"></privacy-agreement>
    </div>

@endsection
