@extends('client.layouts.client_frame')

@section('content')

    <div id="invoiceComponent">
        <invoice-component :invoice="{{$invoice}}" :modal="false"></invoice-component>
    </div>

@endsection
