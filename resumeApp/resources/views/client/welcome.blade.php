@extends('layouts.client-app')
@section('content')
   <div class="container">
       <h1>Hello {{\Illuminate\Support\Facades\Auth::guard('client')->user()->name}}!</h1>
   </div>
@endsection