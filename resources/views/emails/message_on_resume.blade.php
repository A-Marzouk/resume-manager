@extends('layouts.email')

@section('content')
    <div class="greeting" >Hello {{$agent->user->userData->first_name}} !</div>
    <hr>
    <div class="mailText">
        A new message on your 123workforce resume:<br/>
        From : {{ $form_data->full_name }} ({{$form_data->email}})<br/>
    </div>
    <br/>
    <div class="mailText">
        <b> Title : {{$form_data->title}} <br/>  </b>
        Message : {{$form_data->message}}
    </div>
    <br/>
    <div class="mailText">
        Kindest Regards,<br/><b>123 Workforce</b>
    </div>
@endsection

