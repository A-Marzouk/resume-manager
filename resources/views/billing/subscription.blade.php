@extends('layouts.my-app')

@section('content')

    <div style="display: flex; font-size: 24px; font-weight: 500; flex-direction: column; align-items: center; justify-content: center; height: 100vh; width: 100%">
        <div class="loader" style="margin-bottom: 20px;"></div>
        <div style="color: #001be2;">
            Safely redirecting you to the payment page
        </div>
    </div>

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

    <style>
        .loader {
            border: 12px solid #f3f3f3;
            border-radius: 50%;
            border-top: 12px solid #001be2;
            width: 100px;
            height: 100px;
            -webkit-animation: spin 2s linear infinite; /* Safari */
            animation: spin 2s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
@endsection

