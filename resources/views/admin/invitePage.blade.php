@extends('layouts.app')

@section('content')
    <div id="send_invitations_vue">
        <send-invitations :job="{{$job}}"></send-invitations>
    </div>
@endsection