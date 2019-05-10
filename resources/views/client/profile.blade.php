@extends('layouts.client-app')
@section('content')
    <div class="container">
        <div class="panelFormLabel NoDecor">
            Personal Information
            <a href="#" class="buttonMain ">Edit</a>
            <hr>
        </div>
        <div class="row">
            Name : {{$client->name}}<br/>
            Email: {{$client->email}}<br/>
            Email Dept: {{$client->emailDept}}<br/>
            Phone : {{$client->phone}}<br/>
            Agency : {{$client->agency}}<br/>
            Time zone : {{$client->timeZone}}<br/>
            @if(isset($client->affiliate))
                Affiliate : {{$client->affiliate->name}}<br/>
            @endif
        </div>
    </div>
@endsection