@extends('client.layouts.client_frame')

@section('content')
    <div id="approvedAgentProfile">

        <approved-agent-profile user_id="{{$user_id}}"></approved-agent-profile>
    </div>
@endsection