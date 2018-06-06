@extends('layouts.email')

@section('content')
    <td class="body" width="100%" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; background-color: #FFFFFF; border-bottom: 1px solid #EDEFF2; border-top: 1px solid #EDEFF2; margin: 0; padding: 0; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
        <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; background-color: #FFFFFF; margin: 0 auto; padding: 0; width: 570px; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 570px;">
            <!-- Body content -->
            <tr>
                <td class="content-cell" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; padding: 35px;">
                    <h1 style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #2F3133; font-size: 19px; font-weight: bold; margin-top: 0; text-align: left;">Hello! </h1>
                    <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">
                        Thank you,  {{$firstName}} {{$lastName}} for completing your online registration with 123 Workforce.<br/>

                        We don't require any further interviews or documents from you at this time.

                        We are now actively promoting your cv to our list of clients currently hiring. <br/>We are currently seeking a suitable company for you to work at for your preferred hourly rate and availability, will be in touch with you as soon as we have a good job offer for you.

                        <br/><br/>Please feel free to contact us at anytime with questions that you could have on riz@123workforce.com.  Could we also ask you to please edit your availability of hours should it change over time by signing in and edit hours. With this, we can accurately place and match  you with the most suitable clients.

                    </p>
                    <table class="action" align="center" width="100%" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; margin: 30px auto; padding: 0; text-align: center; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
                        <tr>
                            <td align="center" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                <table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                    <tr>
                                        <td align="center" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                            <table border="0" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                <tr>
                                                    <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                        <a href="https://123workforce.com/{{$username}}"; class="button button-blue" target="_blank" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; border-radius: 3px; box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16); color: #FFF; display: inline-block; text-decoration: none; -webkit-text-size-adjust: none; background-color: #3097D1; border-top: 10px solid #3097D1; border-right: 18px solid #3097D1; border-bottom: 10px solid #3097D1; border-left: 18px solid #3097D1;">View Resume</a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">
                        Wishing you ongoing success with your current projects !<br/>
                        Kindest Regards, 123 Workforce</p>
                </td>
            </tr>
        </table>
    </td>
@endsection