@extends('client.layouts.client_frame')

@section('content')

    <div id="addAgent">
        <add-agent-component :clientCampaigns = "{{$clientCampaigns}}"></add-agent-component>
    </div>

@endsection