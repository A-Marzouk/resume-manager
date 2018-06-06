@extends('layouts.client-app')
@section('content')
    <? if(session()->get('admin') && session()->get('admin') == 'AdminWasHere'):?>
    <div class="container alert alert-success">
        You are viewing as Admin
    </div>
    <? endif;?>
   <div class="container">
       <h1>Hello {{\Illuminate\Support\Facades\Auth::guard('client')->user()->name}}!</h1>
   </div>
@endsection