@extends('client.layouts.client_frame')

@section('content')

    <div id="updateSubPlan">
        <update-sub-plan :subscription="{{json_encode($subscription)}}"></update-sub-plan>
    </div>

@endsection