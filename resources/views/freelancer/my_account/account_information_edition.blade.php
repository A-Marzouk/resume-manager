@extends('freelancer.layouts.freelancer_frame')

@section('content')

    <div id="freelancer_account_info_edit">
        <freelancer-account-info-edit :current_user="{{ json_encode($currentUser) }}"></freelancer-account-info-edit>
    </div>

@endsection
