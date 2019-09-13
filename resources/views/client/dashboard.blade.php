@extends('client.layouts.client_frame')

@section('content')
   <div id="clientDashboardComponent">
       <client-dashboard :client="{{currentClient()}}"></client-dashboard>
   </div>
@endsection