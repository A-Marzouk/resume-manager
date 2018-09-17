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
        <div class="row">
            <div class="col-md-6">
                <div class="paymentHeader">
                    Payment Options
                </div>
                <div class="paymentOption">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="/resumeApp/resources/views/customTheme/images/checked_method.png" alt="" style="padding-bottom: 2px;padding-right: 6px;width: 23px;">
                            <span class="paymentText font-weight-bold">Stripe</span>
                            <div class="paymentNote NoDecor" style="font-weight: normal; color:#72808E;">
                                Complete your purchase securely with <a href="https://stripe.com" target="_blank">Stripe</a>.
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <img src="/resumeApp/resources/views/customTheme/images/stripe-logo.png" alt="stripe logo" width="90" height="24">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="paymentHeader">
                    Payment Details
                </div>
                <div class="paymentDetails">
                    <div class="row">
                        <div class="col-md-6 paymentText" style="color: #697786;">
                            Hourly rate :
                        </div>
                        <div class="col-md-6 text-right paymentText font-weight-bold" style="color: #697786;">
                            {{intval($freelancer->userData->salary)+5}} $
                        </div>
                    </div>
                    <div class="row border-bottom" style="padding-top: 20px; padding-bottom: 40px;">
                        <div class="col-md-6 paymentText" style="color: #697786;">
                            {{$hours}} hours
                        </div>
                        <div class="col-md-6 text-right paymentText font-weight-bold" style="color: #697786;">
                            x {{$hours}}
                        </div>
                    </div>
                    <div class="row" style="padding-top: 20px; padding-bottom: 30px;">
                        <div class="col-md-6 paymentText" style="color: #697786; font-size: 18px;">
                            Total to Pay :
                        </div>
                        <div class="col-md-6 text-right paymentText font-weight-bold" style="color: #697786; font-size: 18px;">
                            {{(intval($freelancer->userData->salary)+5) * $hours}} $
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="/stripe/payments/pay" method="POST" id="stripeForm{{$freelancer->id}}">

                                {{ csrf_field() }}

                                <input type="hidden" value="{{$amountToPay}}" name="amountToPay">
                                <input type="hidden" value="{{$freelancer->userData->name}}" name="freelancerName">
                                <input type="hidden" value="{{$freelancer->id}}" name="freelancerID">
                                <input type="hidden" value="{{$hours}}" name="hours">
                                <script
                                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                        data-key="pk_test_8Pd2lN3so4z5vBOP98MgNcms"
                                        data-amount="{{$amountToPay}}"
                                        data-name="Hire  {{$freelancer->userData->name}}"
                                        data-description="For {{$hours}}"
                                        data-image="/resumeApp/resources/views/customTheme/images/newResume/logo.png"
                                        data-locale="auto">
                                </script>
                                <script>
                                    document.getElementsByClassName("stripe-button-el")[0].style.display = 'none';
                                </script>
                                <div class="row text-center">
                                    <div class="col-10 offset-1" style="padding-top: 0; margin-top: 0;">
                                        <button class="btn-block paymentBtn cursorPointerOnHover" type="submit">Confirm and Pay</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <br/>
    <div class="container col-11">
        @include('freelancer_card_small')
    </div>
@endsection