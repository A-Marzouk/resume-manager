@extends('client.layouts.client_frame')

@section('content')

    <div id="campaignMainComponent">
        <campaign-main :campaign = "{{$campaign}}"></campaign-main>
    </div>

@endsection