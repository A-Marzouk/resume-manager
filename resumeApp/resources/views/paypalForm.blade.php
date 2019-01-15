@extends('layouts.client-app')

@section('content')
    <div class="container">
        <div class="customFormHeader"> PayPal Payments</div><br/>
        <form action="{{route('submit.paypal.form')}}" method="POST">
            {{ csrf_field() }}

            <div class="form-group col-md-6 offset-md-3">
                <label for="amount" class="panelFormLabel">Amount to pay * <small> (USD) </small>
                    </span>
                </label>
                <input type="text" class="form-control panelFormInput" id="amount" name="amountToPay" required>
            </div> <!-- amount to pay -->

            <div class="form-group col-md-6 offset-md-3">
                <label for="description" class="panelFormLabel">Description of payment * </label>
                <textarea class="form-control" rows="3" id="description" name="description" required></textarea>
            </div> <!-- description -->

            <input type="hidden" name="custom_payment" value="true" required>

            <div class="buttonMain whiteBg col-md-4 offset-md-4">
                <button class="hireBtn btn-block hire" type="submit">Pay via PayPal</button>
            </div>
        </form>

    </div>
@endsection