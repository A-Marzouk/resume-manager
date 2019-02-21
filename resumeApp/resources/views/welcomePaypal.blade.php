@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @if (session()->has('message'))
                    <div class="alert alert-{{ session()->get('code') }}">
                        <p>{{ session()->get('message') }}</p>
                    </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">Express checkout</div>
                    <div class="panel-body">
                        Pay $20 via:
                        <a href="{{ route('paypal.express-checkout') }}" class='btn-info btn'>PayPal</a>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Recurring payments</div>
                    <div class="panel-body">
                        Pay $20/month:
                        <a href="{{ route('paypal.express-checkout', ['recurring' => true]) }}" class='btn-info btn'>PayPal</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection