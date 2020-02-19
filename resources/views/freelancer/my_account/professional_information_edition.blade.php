@extends('freelancer.layouts.freelancer_frame')

@section('content')

    <div id="freelancer_professional_info_edit">
        <freelancer-professional-info-edit :current_user="{{ json_encode($currentUser) }}"></freelancer-professional-info-edit>
    </div>

@endsection
