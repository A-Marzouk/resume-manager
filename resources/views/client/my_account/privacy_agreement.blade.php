@extends('client.layouts.client_frame')

@section('content')

    <div id="privacyAgreement">
        <privacy-agreement :client="{{auth()->user()}}"></privacy-agreement>
    </div>

@endsection