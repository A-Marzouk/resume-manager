@extends('layouts.admin')

@section('content')

    <div id="freelancersList">
        <freelancers-list @if(isset($users)) :users="{{$users}}" @endif></freelancers-list>
    </div>

@endsection
