@extends('layouts.client-app')

@section('content')
    <div class="container" style="margin-top: 40px;">
        <form action="/stripe/payments/pay" method="POST">
            {{ csrf_field() }}
            <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="pk_test_dP2SSGFjJP7N2O8kgWWpbf96"
                    data-amount="97500"
                    data-name="Hire a freelancer"
                    data-description="Test charge"
                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                    data-locale="auto">
            </script>
        </form>
    </div>
@endsection