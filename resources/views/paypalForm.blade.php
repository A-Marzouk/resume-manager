@extends('layouts.client-app')

@section('content')
    <div class="container">
        <div class="customFormHeader"> PayPal Payments</div><br/>
        <form action="{{route('paypal.express-checkout')}}" method="POST">
            {{ csrf_field() }}
            <div class="form-group col-md-6 offset-md-3">
                <label for="amount" class="panelFormLabel">Amount to pay * <small> (USD) </small></label>
                <input type="text" class="form-control panelFormInput" id="amount" name="amountToPay" required>
            </div> <!-- amount to pay -->

            <div class="form-group col-md-6 offset-md-3">
                <label for="description" class="panelFormLabel">Description of payment * </label>
                <textarea class="form-control" rows="3" id="description" name="description" required></textarea>
            </div> <!-- description -->

            <div class="form-group col-md-6 offset-md-3">
                <label for="weeks" class="panelFormLabel">Recurring payments <small><br/>(Leave empty for one time payment)</small></label>
                <input type="number" placeholder="Number of weeks.." min="0" max="24" id="weeks" class="panelFormInput form-control" name="weeks">
            </div>

            <input type="hidden" name="custom_payment" value="true">

            <div class="buttonMain whiteBg col-md-4 offset-md-4">
                <button class="hireBtn btn-block hire" type="submit">Pay via PayPal</button>
            </div>
        </form>

    </div>
@endsection