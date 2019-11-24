@extends('freelancer.layouts.freelancer_frame')

@section('content')

    <div id="freelancer_media_info_edit">
        <freelancer-media-info-edit :current_user="{{ json_encode($currentUser) }}"></freelancer-media-info-edit>
    </div>

@endsection
