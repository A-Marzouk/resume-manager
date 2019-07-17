@extends('client.layouts.client_frame')

@section('content')
    <div id="applicantProfile">
        <applicant-profile user_id="{{$user_id}}"></applicant-profile>
    </div>
@endsection