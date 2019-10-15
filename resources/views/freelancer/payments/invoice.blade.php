@extends('client.layouts.client_frame')

@section('content')

    <div id="invoiceComponent">
        <agent-invoice-component :invoice="{{$invoice}}" :modal="false"></agent-invoice-component>
    </div>

@endsection
