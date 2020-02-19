@extends('freelancer.layouts.freelancer_frame')

@section('content')
   <div id="freelancerDashboardComponent">
      <freelancer-dashboard :agent="{{$agent}}"></freelancer-dashboard>
   </div>
@endsection
