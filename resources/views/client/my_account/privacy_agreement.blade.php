@extends('client.layouts.client_frame')

@section('content')

    <div id="privacyAgreement">
        <privacy-agreement :client="{{currentClient()}}"></privacy-agreement>
    </div>

@endsection