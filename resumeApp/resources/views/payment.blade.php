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
        <div class="pageHeading">
            Hire <b>{{$freelancer->firstName}} {{$freelancer->lastName}}</b> For <b>{{$hours}} Hours</b>
        </div>
        <div class="pageSubHeading">

        </div>
        {{-- freelancer card --}}
        <? $showVideo = false ; ?>
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
            <div class="row text-center hireBtnArea">
                <div class="buttonMain whiteBg col-md-6 col-8 offset-md-3 offset-2" style="padding-top: 0; margin-top: 0;">
                    <button class="hireBtn btn-block hire" type="submit">Pay via Stripe</button>
                </div>
            </div>
        </form>
        <br/>
        @include('freelancer_card')
        {{-- end of it --}}
    </div>

@endsection