
<div id="freelancersInfo">
    <div class="row text-center">
        <div class="col-md-12">
            <div class="freelancerItem">
                <img src="{{$user->photo}}" alt="freelancer" class="freelancerImg" width="150" height="150">
                <div class="freelancerData">
                    <div class="freelancerName">
                        {{$user->name}}
                    </div>
                    <div class="freelancerJob">
                        {{$user->jobTitle}}
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-2 offset-lg-4 col-md-4 offset-md-2">
            <form action="/stripe/payments/pay" method="POST">
                {{ csrf_field() }}
                <?
                    $userRate = $user->salary ;
                    $hours =10 ;
                    $amountToPay = ( $userRate+5 ) * $hours * 100 ;
                ?>
                <input type="hidden" value="{{$amountToPay}}" name="amountToPay">
                <input type="hidden" value="{{$user->name}}" name="freelancerName">
                <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_8Pd2lN3so4z5vBOP98MgNcms"
                        data-amount="{{$amountToPay}}"
                        data-name="Hire  {{$user->name}}"
                        data-description="for 10 hours"
                        data-image="/resumeApp/resources/views/customTheme/images/newResume/logo.png"
                        data-locale="auto">
                </script>
                <script>
                    document.getElementsByClassName("stripe-button-el")[0].style.display = 'none';
                </script>
                <div class="buttonMain whiteBg">
                    <button class="hireBtn btn-block hire" type="submit">Hire Me</button>
                </div>
            </form>
        </div>
        <div class="col-lg-2 col-md-4">
            <div class="buttonMain">
                <a class="hireBtn btn-block" href="#">Send me message </a>
            </div>
        </div>
    </div>
</div>

<div id="quote">
    <div class="row">
        <div class="col-lg-1 offset-lg-1">
            <img src="resumeApp/resources/views/customTheme/images/newResume/quote.png" alt="quote">
        </div>
        <div class="col-lg-10 col-md-12">
            <div class="quoteText">
                {{$user->intro}}
            </div>
        </div>
    </div>
</div>