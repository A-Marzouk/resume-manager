@extends('client.layouts.client_frame')

@section('content')

    <div id="serviceAgreement">
        <service-agreement :client="{{currentClient()}}"></service-agreement>
    </div>

@endsection