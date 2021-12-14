@extends('client.layouts.client_frame')

@section('content')

    <div id="serviceAgreement">
        <service-agreement :client="{{auth()->user()}}"></service-agreement>
    </div>

@endsection