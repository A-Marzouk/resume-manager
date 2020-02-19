@extends('client.layouts.client_frame')

@section('content')

    <div id="privacyAgreement">
        <privacy-agreement :client="{{currentClient()}}" :user="{{currentClient()->user}}"></privacy-agreement>
    </div>

@endsection