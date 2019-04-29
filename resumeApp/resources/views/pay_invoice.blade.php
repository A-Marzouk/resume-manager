@extends('layouts.app')

@section('content')
    <div class="container" id="invoice">
        <div class="row">
            <div class="offset-md-2 col-md-8">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div>
                            <img src="/resumeApp/public/images/newResume/123wf_logo.png" alt="logo" width="100%">
                        </div>
                        <div style="padding-top: 10px;">
                            <img src="/resumeApp/resources/assets/images/invoice/invoice_word.png" alt="word" width="99%">
                        </div>
                        <div class="invoiceNumber">
                            Invoice Number {{$invoice->unique_number}}
                        </div>

                        <div class="agentName">
                            Name of Agents :<br/>
                            @if(isset($invoice->user))
                                {{$invoice->user->firstName}} {{$invoice->user->lastName}}
                            @endif
                            <? $users = [] ;?>
                            @foreach($invoice->services as $service)
                                @foreach($service->agents as $user)
                                    <?
                                     $users[$user->id] = $user->firstName . ' ' .$user->lastName ;
                                    ?>
                                @endforeach
                            @endforeach
                            @foreach(array_unique($users) as $name)
                                - {{$name}} <br/>
                            @endforeach
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


                @if(count($invoice->services) > 0)
                    <div class="termsText">
                        <div class="blueLine" style="margin-bottom: 10px;background-color: lightblue"></div>
                        Custom services :
                    </div>

                    @foreach($invoice->services as $service)
                        <div class="row clientInfo">
                            <div class="col-3">
                                SERVICE
                            </div>
                            <div class="col-3">
                                HOURS
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
                                {{$service->title}}
                            </div>
                            <div class="col-3 text-left">
                                {{$service->hours}} hours
                            </div>
                            <div class="col-3">
                                {{$service->rate}}
                            </div>
                            <div class="col-3" style="border: none; word-break: break-word;">
                                @if($service->days === 'all_days') All business days @else {{$service->days}} @endif
                            </div>
                        </div>
                    @endforeach
                    <div class="blueLine" style="margin-bottom: 10px;margin-top: 10px;background-color: lightblue"></div>

                @endif



                <div class="row clientInfo">
                    <div class="col-4">
                        SERVICES PROVIDED
                    </div>
                    <div class="col-2">
                        NO. OF HRS / WEEK
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
                        @foreach($invoice->services as $service)
                            {{$service->title}}<br/>
                        @endforeach
                        @if(count($invoice->services) == 0)
                            {{$invoice->service}}
                        @endif
                    </div>
                    <div class="col-2">
                        {{$invoice->hours}}
                    </div>
                    <div class="col-2">
                        {{$invoice->total_amount}}
                    </div>
                    <div class="col-2" style="border: none;">
                        {{$invoice->currency}}
                    </div>
                </div>

                <div class="row buttonsRow" style="padding: 15px;">
                    @if(in_array('stripe',explode(',',$invoice->payment_options)))
                        <div class="col-12">
                            <form action="/stripe/payments/pay" method="POST">
                                {{ csrf_field() }}
                                <div class="d-none">
                                    <input type="text" value="{{$invoice->total_amount}}" id="amountToPay" name="amountToPay">
                                    <!-- amount to pay -->
                                    <input type="text" value="{{$invoice->service}}" id="description" name="description">
                                    <!-- description -->
                                </div>

                                <input type="hidden" value="invoice" name="paymentInfo">
                                <input type="hidden" value="{{$invoice->id}}" name="invoice_id">
                                <input type="hidden" value="{{$invoice->client->id}}" name="client_id">
                                <input type="hidden" value="{{$invoice->hours}}" name="hours">
                                @if(in_array('recurring',explode(',',$invoice->payment_options)))
                                    <div class="form-group col-md-12">
                                        <label for="weeks" class="panelFormLabel">Recurring payments <small><br/>(Leave empty for one time payment)</small></label>
                                        <select name="weeks" id="weeks" class="custom-select panelFormInput">
                                            <option value="" selected disabled>-- Select --</option>
                                            <option value="pay_as_you_go">Pay as you go</option>
                                            <option value="1">1 week</option>
                                            @for($i=2;$i<=54;$i++)
                                                <option value="{{$i}}">{{$i}} weeks</option>
                                            @endfor
                                        </select>
                                    </div>
                                @endif
                                <script
                                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                        data-key="{{env('STRIPE_KEY')}}"
                                        data-amount=""
                                        data-name="123 Workforce"
                                        data-description="Custom payment"
                                        data-image="/resumeApp/public/images/newResume/logo.png"
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
                    @endif
                    @if(in_array('paypal',explode(',',$invoice->payment_options)))
                        <div class="col-12">
                                <form action="{{route('paypal.express-checkout')}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{$invoice->total_amount}}" name="amountToPay" required>
                                    <!-- amount to pay -->
                                    <input type="hidden" value="{{$invoice->service}}"  name="description" required>
                                    <!-- description -->
                                    <input type="hidden" name="custom_payment" value="true" required>
                                    <input type="hidden" name="invoice_id" value="{{$invoice->id}}" required>
                                    {{--to make the paypal recurring back - remove the word _removed--}}
                                    @if(in_array('recurring_removed',explode(',',$invoice->payment_options)))
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
                    @endif
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