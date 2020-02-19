@extends('freelancer.layouts.freelancer_frame')

@section('content')

    <div id="freelancerCampaignMainComponent">
        <freelancer-campaign-main :campaign = "{{$campaign}}"></freelancer-campaign-main>
    </div>

@endsection
