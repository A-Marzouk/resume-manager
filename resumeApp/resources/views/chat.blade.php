@extends('layouts.client-app')

@section('content')
    <div id="app" class="container col-6">
        <h1 style="color: gainsboro; padding: 10px;">Talk to sales</h1>
        <div class="container">
           <chat-log :messages="messages" id="chatLogs"></chat-log>
       </div><br/>
        <div class="container">
            {{-- v-on:messageSent means when the event is emited --}}
            {{-- addMessage method should be defiened on the root scope not components--}}
            <chat-composer v-on:messagesent="addMessage"></chat-composer>
        </div>
    </div>
@endsection