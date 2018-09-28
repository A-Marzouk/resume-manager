@extends('layouts.app')

@section('content')
    <div id="newChat">
        <div class="">
            <new-chat client_id="@if($currClient){{$currClient->id}}@endif" user_id="@if($currUser){{$currUser->id}}@endif"></new-chat>
        </div>
    </div>
@endsection
