@extends('layouts.my-app')

@section('content')
    <script src="https://js.stripe.com/v3/"></script>
    <span id="stripe_public_key" style="display: none">{{config('services.stripe.key')}}</span>
    <script>
        var stripe = Stripe(document.getElementById('stripe_public_key').innerText);
        let searchParams = new URLSearchParams(window.location.search);

        if (searchParams.has('session_id')) {
            let param = searchParams.get('session_id');
            stripe.redirectToCheckout({
                sessionId: param
            }).then(function (result) {
                // If `redirectToCheckout` fails due to a browser or network
                // error, display the localized error message to your customer
                // using `result.error.message`.
                console.log(result.error.message);
            });
        }else{

        }
    </script>
@endsection

