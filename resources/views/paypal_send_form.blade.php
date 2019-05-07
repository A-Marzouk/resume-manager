@extends('layouts.affiliate-app')

@section('content')
    <div class="container">
        <div class="pageHeading"> PayPal Payments</div><br/>
        <form action="{{route('submit.paypal.send.form')}}" method="POST">
            {{ csrf_field() }}

            <div class="form-group col-md-6 offset-md-3">
                <label for="amount" class="panelFormLabel">Amount to pay * <small> (USD) </small>
                </label>
                <input type="text" class="form-control panelFormInput" id="amount" name="amount" required>
            </div> <!-- amount to pay -->

            <div class="form-group col-md-6 offset-md-3">
            <label for="paypal_email" class="panelFormLabel">Email *
            </label>
            <input type="text" class="form-control panelFormInput" id="paypal_email" name="paypal_email" required>
            </div> <!-- paypal email -->


            <div class="buttonMain whiteBg col-md-4 offset-md-4">
                <button class="hireBtn btn-block hire" type="submit">Pay via Paypal</button>
            </div>
        </form>

    </div>
@endsection