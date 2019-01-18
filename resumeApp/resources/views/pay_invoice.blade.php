@extends('layouts.app')

@section('content')
    <div class="container" id="invoice">
        <div class="row">
            <div class="offset-md-2 col-md-8">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div>
                            <img src="/resumeApp/resources/views/customTheme/images/newResume/123wf_logo.png" alt="logo" width="100%">
                        </div>
                        <div style="padding-top: 10px;">
                            <img src="/resumeApp/resources/assets/images/invoice/invoice_word.png" alt="word" width="99%">
                        </div>
                        <div class="invoiceNumber">
                            Invoice Number {{$invoice->unique_number}}
                        </div>

                        <div class="agentName">
                            Name of Agent :  {{$invoice->agentName}}<br/>
                        </div>
                        <div class="termsText">
                            Status     : {{$invoice->status}}
                        </div>
                    </div>
                    <div class="col-md-4 offset-md-4 d-none d-md-block">
                        <div>
                            <img src="/resumeApp/resources/assets/images/invoice/circle_logo.png" alt="word" width="auto" height="150px">
                        </div>
                    </div>
                </div>
                <div class="row clientInfo">
                    <div class="col-4">
                        CLIENT NAME
                    </div>
                    <div class="col-4">
                        CLIENT COMPANY
                    </div>
                    <div class="col-4">
                        CLIENT CONTACT
                    </div>
                </div>

                <div class="row clientInfo_detail">
                    <div class="col-4">
                        {{$invoice->client->name}}
                    </div>
                    <div class="col-4">
                        {{$invoice->client->agency}}
                    </div>
                    <div class="col-4" style="border: none; word-break: break-word;">
                         {{$invoice->client->phone}}<br/>
                         {{$invoice->client->email}}
                    </div>
                </div>

                <div class="row clientInfo">
                    <div class="col-6">
                        SERVICE PROVIDED
                    </div>
                    <div class="col-2">
                        NO. OF HRS / WEEK
                    </div>
                    <div class="col-2">
                        RATE / HR
                    </div>
                    <div class="col-2">
                        TOTAL DUE
                    </div>
                </div>
                <div class="row clientInfo_detail">
                    <div class="col-6 text-left">
                        {{$invoice->service}}<br/><br>
                        {{$invoice->time_of_service}}<br/><br>
                        {{$invoice->client->timeZone}}
                    </div>
                    <div class="col-2">
                        {{$invoice->hours}}
                    </div>
                    <div class="col-2">
                        {{$invoice->rate}} USD
                    </div>
                    <div class="col-2" style="border: none;">
                        {{$invoice->total_amount}}
                    </div>
                </div>

                <div class="row buttonsRow">
                    <div class="col-6">
                        <form action="/stripe/payments/pay" method="POST">
                            {{ csrf_field() }}
                            <div class="d-none">
                                <input type="text" value="{{$invoice->total_amount}}" id="amountToPay" name="amountToPay" required>
                                <!-- amount to pay -->
                                <input type="text" value="{{$invoice->service}}" id="description" name="description" required>
                                <!-- description -->
                            </div>

                            <input type="hidden" value="custom_payment" name="freelancerName">
                            <input type="hidden" value="{{$invoice->id}}" name="invoice_id">
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
                            <div class="buttonMain whiteBg col-md-8 offset-md-2" style="padding-top: 10px; padding-bottom: 10px;">
                                <button class="hireBtn btn-block hire" type="submit">Pay via Stripe</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-6">
                        <form action="{{route('submit.paypal.form')}}" method="POST">
                            {{ csrf_field() }}
                                <input type="hidden" value="{{$invoice->total_amount}}" name="amountToPay" required>
                                <!-- amount to pay -->
                                <input type="hidden" value="{{$invoice->service}}"  name="description" required>
                                <!-- description -->
                                <input type="hidden" name="custom_payment" value="true" required>
                                <input type="hidden" name="invoice_id" value="{{$invoice->id}}" required>

                                <div class="buttonMain whiteBg col-md-8 offset-md-2" style="padding-top: 10px; padding-bottom: 25px;">
                                    <button class="hireBtn btn-block hire" type="submit">Pay via PayPal</button>
                                </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="termsText">
                            Terms of payment - Weekly in advance <br/>
                            Contract - Weekly
                        </div>
                    </div>
                </div>

                <div class="row" style="padding-top:15px; ">
                    <div class="col-md-8 col-12">
                        <img src="/resumeApp/resources/assets/images/invoice/payment-systems.png" alt="payment" width="100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection