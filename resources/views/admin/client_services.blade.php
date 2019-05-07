@extends('layouts.app')

@section('content')
    @include('admin.includes.messages')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div id="client_services">
                    <services-list :client_id = {{$client->id}}></services-list>
                </div>
            </div>
        </div>
    </div>
@endsection