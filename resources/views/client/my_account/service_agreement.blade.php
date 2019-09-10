@extends('client.layouts.client_frame')

@section('content')

    <div id="serviceAgreement">
        <service-agreement  :client="{{currentClient()}}" :user="{{currentClient()->user}}"></service-agreement>
    </div>

@endsection