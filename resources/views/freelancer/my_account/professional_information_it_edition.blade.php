@extends('freelancer.layouts.freelancer_frame')

@section('content')

    <div id="freelancer_professional_info_it_edit">
        <freelancer-professional-info-it-edit :current_user="{{ json_encode($currentUser) }}"></freelancer-professional-info-it-edit>
    </div>

@endsection
