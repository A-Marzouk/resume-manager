@extends('layouts.email')

@section('content')
    <td class="body" width="100%" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; background-color: #FFFFFF; border-bottom: 1px solid #EDEFF2; border-top: 1px solid #EDEFF2; margin: 0; padding: 0; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
        <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; background-color: #FFFFFF; margin: 0 auto; padding: 0; width: 570px; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 570px;">
            <!-- Body content -->
            <tr>
                <td class="content-cell" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; padding: 35px;">
                    <h1 style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #2F3133; font-size: 19px; font-weight: bold; margin-top: 0; text-align: left;">Hello! </h1>
                    <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">
                        Thank you, <b>{{$firstName}} {{$lastName}}</b> for completing your online registration with 123 Workforce.<br/>

                        We don't require any further interviews or documents from you at this time.<br/>

                        We are now actively promoting your cv to our list of clients currently hiring. <br/><br/>We are currently seeking a suitable company for you to work at for your preferred hourly rate and availability, will be in touch with you as soon as we have a good job offer for you.

                        <br/><br/>Please feel free to contact us at anytime with questions that you could have on <b>riz@123workforce.com</b>.  Could we also ask you to please edit your availability of hours should it change over time by signing in and edit hours. With this, we can accurately place and match  you with the most suitable clients.

                    </p>
                    <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">
                        Wishing you onging success with your current projects !<br/>
                        Kindest Regards,<b>123 Workforce</b></p>
                </td>
            </tr>
        </table>
    </td>
@endsection