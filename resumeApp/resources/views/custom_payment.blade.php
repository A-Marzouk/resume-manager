@extends('layouts.client-app')

@section('content')

    <div style="padding-top: 20px;">
        @if(session()->has('successMessage'))
            <div class="alert alert-success" id="successMessage">
                {{ session()->get('successMessage') }}
            </div>
        @endif
    </div>

    <div class="container">
        <div class="customFormHeader">
            Payments
        </div>
        <form action="/stripe/payments/pay" method="POST">
            {{ csrf_field() }}

            <div class="form-group col-md-6 offset-md-3">
                <label for="amountToPay" class="panelFormLabel">Amount to pay * <small> (USD) </small>
                </span>
                </label>
                <input type="text" class="form-control panelFormInput" id="amountToPay" name="amountToPay" required>

            </div> <!-- amount to pay -->

            <div class="form-group col-md-6 offset-md-3">
                <label for="description" class="panelFormLabel">Description of payment * </label>
                <textarea class="form-control" rows="3" id="description" name="description" required></textarea>
            </div> <!-- description -->

            <input type="hidden" value="Freelancer (Custom payment)" name="freelancerName">
            <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="pk_live_JaqaQq8e8cJYTXSEk9UZoy8k"
                    data-amount=""
                    data-name="123 Workforce"
                    data-description="Custom payment"
                    data-image="/resumeApp/resources/views/customTheme/images/newResume/logo.png"
                    data-locale="auto"
                    id="customPayment">
            </script>
            <script>
                document.getElementsByClassName("stripe-button-el")[0].style.display = 'none';
            </script>
            <div class="buttonMain whiteBg col-md-4 offset-md-4">
                <button class="hireBtn btn-block hire" type="submit">Pay via Stripe</button>
            </div>
        </form>
    </div>
@endsection