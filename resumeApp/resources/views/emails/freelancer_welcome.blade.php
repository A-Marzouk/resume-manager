@extends('layouts.email')

@section('content')
    <div class="mailText">
        Thank you, <b style="color: #0290D8;">{{$firstName}} {{$lastName}}</b> for completing your online registration with 123 Workforce.<br/>

        We don't require any further interviews or documents from you at this time.<br/>

        We are now actively promoting your cv to our list of clients currently hiring. <br/><br/>We are currently seeking a suitable company for you to work at for your preferred hourly rate and availability, will be in touch with you as soon as we have a good job offer for you.

        <br/><br/>Please feel free to contact us at anytime with questions that you could have on <b style="color: #0290D8;"><a href="mailto:riz@123 workforce.com">riz@123 workforce.com</a></b>.  Could we also ask you to please edit your availability of hours should it change over time by signing in and edit hours. With this, we can accurately place and match  you with the most suitable clients.

        <br/><br/>Wishing you onging success with your current projects !<br/><br/>

        Kindest Regards,<br/><b>123 Workforce</b></p>
    </div>
@endsection