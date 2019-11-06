@extends('freelancer.layouts.freelancer_frame')

@section('content')

    <div id="freelancer_account_info_edit">
        <freelancer-account-info-edit :agent-data="{{ json_encode($agentData) }}"></freelancer-account-info-edit>
    </div>

@endsection