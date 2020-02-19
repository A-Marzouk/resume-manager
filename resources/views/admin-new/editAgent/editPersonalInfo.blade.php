@extends('freelancer.layouts.freelancer_frame')

@section('content')

    <div id="adminEditAgentPersonalInfo"  class="d-flex justify-content-center">
        <admin-agent-edit-personal-info user_id="{{$user_id}}"></admin-agent-edit-personal-info>
    </div>

@endsection