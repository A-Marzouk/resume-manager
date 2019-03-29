@extends('client.layouts.client_frame')

@section('content')
   <div id="clientDashboardComponent">
       <client-dashboard client="{{$client}}"></client-dashboard>
   </div>
@endsection