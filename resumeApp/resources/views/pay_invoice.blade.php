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
                            Name of Agent :  @if(isset($invoice->user->id)){{$invoice->user->firstName}} {{$invoice->user->lastName}} @else {{$invoice->agentName}}@endif<br/>
                        </div>
                        <div class="termsText">
                            Invoice issue date    : {{$invoice->created_at->format('d.m.Y')}}
                        </div>
                        <div class="termsText">
                            Status     :
                            @if($invoice->status === 'Paid') <span style="color:lightgreen; font-size:16px;">Paid</span>
                            @else
                                <span style="color:orange; font-size:16px;">Unpaid</span>
                            @endif
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
                    <div class="col-4">
                        Working hours
                    </div>
                    <div class="col-4">
                        Days
                    </div>
                    <div class="col-4">
                        Year - Week
                    </div>
                </div>

                <div class="row clientInfo_detail">
                    <div class="col-4">
                        <span class="row">
                            <span class="col-4 text-left">
                                From:
                            </span>
                            <span class="col-6">
                                {{$invoice->start_time}}
                            </span>
                        </span>
                        <span class="row">
                            <span class="col-4 text-left">
                                To:
                            </span>
                            <span class="col-6">
                                {{$invoice->end_time}}
                            </span>
                        </span>
                    </div>
                    <div class="col-4">
                        @if($invoice->days == 'all_days')
                            All business days.
                        @else
                            {{$invoice->days}}
                        @endif

                    </div>
                    <div class="col-4" style="border: none; word-break: break-word;">
                        {{$invoice->week}}<br/>
                        {{$invoice->weekDate}}
                    </div>
                </div>

                @if(count($invoice->shifts) > 0)
                    <div class="termsText">
                        <div class="blueLine" style="margin-bottom: 10px;background-color: lightblue"></div>
                        Custom shifts :
                    </div>

                    @foreach($invoice->shifts as $shift)
                        <div class="row clientInfo">
                            <div class="col-3">
                                SHIFT SERVICE
                            </div>
                            <div class="col-3">
                                SHIFT TIME
                            </div>
                            <div class="col-3">
                                RATE
                            </div>
                            <div class="col-3">
                                DAYS
                            </div>
                        </div>

                        <div class="row clientInfo_detail">
                            <div class="col-3">
                                {{$shift->service}}
                            </div>
                            <div class="col-3 text-left">
                                From: {{$shift->start_time}}<br/>
                                To: {{$shift->end_time}}
                            </div>
                            <div class="col-3">
                                {{$shift->rate}}
                            </div>
                            <div class="col-3" style="border: none; word-break: break-word;">
                                @if($shift->days === 'all_days') All business days @else {{$shift->days}} @endif
                            </div>
                        </div>
                    @endforeach
                    <div class="blueLine" style="margin-bottom: 10px;margin-top: 10px;background-color: lightblue"></div>

                @endif



                <div class="row clientInfo">
                    <div class="col-4">
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
                    <div class="col-2">
                        CURRENCY
                    </div>
                </div>
                <div class="row clientInfo_detail">
                    <div class="col-4 text-left">
                        {!!nl2br($invoice->service)!!}<br/><br>
                        {!!nl2br($invoice->time_of_service)!!}<br/><br>
                        {!!nl2br($invoice->timeZone)!!}
                    </div>
                    <div class="col-2">
                        {{$invoice->hours}}
                    </div>
                    <div class="col-2">
                        {{$invoice->rate}}
                    </div>
                    <div class="col-2">
                        {{$invoice->total_amount}}
                    </div>
                    <div class="col-2" style="border: none;">
                        {{$invoice->currency}}
                    </div>
                </div>

                <div class="row buttonsRow" style="padding: 15px;">
                    <div class="col-6" style="border-right: 2px solid lightblue;">
                        <form action="/stripe/payments/pay" method="POST">
                            {{ csrf_field() }}
                            <div class="d-none">
                                <input type="text" value="{{$invoice->total_amount}}" id="amountToPay" name="amountToPay" required>
                                <!-- amount to pay -->
                                <input type="text" value="{{$invoice->service}}" id="description" name="description" required>
                                <!-- description -->
                            </div>

                            <input type="hidden" value="invoice" name="paymentInfo">
                            <input type="hidden" value="{{$invoice->id}}" name="invoice_id">
                            @if(in_array('recurring',explode(',',$invoice->payment_options)))
                                <div class="form-group col-md-12">
                                <label for="weeks" class="panelFormLabel">Recurring payments <small><br/>(Leave empty for one time payment)</small></label>
                                <input type="number" placeholder="Number of weeks.." min="0" max="24" id="weeks" class="panelFormInput form-control" name="weeks">
                            </div>
                            @endif
                            <script
                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="{{env('STRIPE_KEY')}}"
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
                            <div class="buttonMain whiteBg col-md-8 offset-md-2" style="margin-top: 10%;padding-top: 10px; padding-bottom: 10px;">
                                <button class="hireBtn btn-block hire" type="submit">Pay via Stripe</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-6">
                        <form action="{{route('paypal.express-checkout')}}" method="POST">
                            {{ csrf_field() }}
                                <input type="hidden" value="{{$invoice->total_amount}}" name="amountToPay" required>
                                <!-- amount to pay -->
                                <input type="hidden" value="{{$invoice->service}}"  name="description" required>
                             <!-- description -->
                                <input type="hidden" name="custom_payment" value="true" required>
                                <input type="hidden" name="invoice_id" value="{{$invoice->id}}" required>

                                @if(in_array('recurring',explode(',',$invoice->payment_options)))
                                    <div class="form-group col-md-12">
                                    <label for="weeks" class="panelFormLabel">Recurring payments <small><br/>(Leave empty for one time payment)</small></label>
                                    <input type="number" placeholder="Number of weeks.." min="0" max="24" id="weeks" class="panelFormInput form-control" name="weeks">
                                </div>
                                @endif
                                <div class="buttonMain whiteBg col-md-8 offset-md-2" style="margin-top: 10%;padding-top: 10px; padding-bottom: 25px;">
                                    <button class="hireBtn btn-block hire" type="submit">Pay via PayPal</button>
                                </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="termsText">
                            Terms of payment - Weekly in advance <br/>
                            Contract - Weekly <br/>
                            <div class="NoDecor">
                                <a href="https://123workforce.com/workforce/campaign_briefs/{{$invoice->campaign_brief_id}}" target="_blank">
                                    View related Campaign Brief
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="padding-top:15px; ">
                    <div class="col-md-8 col-12">
                        <img src="/resumeApp/resources/assets/images/invoice/payment-systems.png" alt="payment" width="100%">
                    </div>
                    <div class="col-12" style="padding-top: 25px;">
                        <a href="{{route('invoice.to.pdf',$invoice->unique_number)}}"  target="_blank" class="btn btn-primary">Export as PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection