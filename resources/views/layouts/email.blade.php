<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>

        .greeting {
            color: #0290D8;
            font-family: Roboto;
            font-size: 25px;
            font-weight: 500;
            line-height: 29px;
            text-align: left; }

        .mailHeader {
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .mailBody {
            background: white !important;
            padding: 50px; }

        .mailText {
            color: #697786;
            font-family: Roboto;
            font-size: 16px;
            line-height: 19px;
        }
        .buttonMain {
            padding: 5% 0 0 0;
            margin-top: 20px;
            text-decoration: none; }
        @media only screen and (max-width: 600px) {
            .buttonMain {
                text-align: center; } }
        .buttonMain a:hover {
            text-decoration: none; }
        .buttonMain .hireBtn {
            border: 1px solid #44E5EF;
            border-radius: 24px;
            background: linear-gradient(270deg, #45E6EF 0%, #088FD9 100%);
            padding: 13px 20px 13px 20px;
            color: #FFFFFF;
            font-family: Roboto;
            font-size: 16px;
            font-weight: bold;
            letter-spacing: 0.5px;
            line-height: 19px;
            text-align: center;
            text-decoration: none;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3); }
        .customFooter {
            height: auto;
            padding-top: 6%;
            text-align: center;
            background: linear-gradient(0deg, #FCFCFC 0%, #FCFCFC 100%); }
        @media only screen and (max-width: 600px) {
            .customFooter {
                height: auto;
                text-align: center; } }
        .customFooter .footerImg img {
            width: 60px;
            opacity: .5; }
        .footerText {
            opacity: 0.4;
            color: #000000;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            text-align: center;
            line-height: 16px; }
        @media only screen and (max-width: 600px) {
            .footerText {
                text-align: center !important;
                padding-top: 10px;
                padding-bottom: 10px; } }

    </style>
</head>
    <div class="mailHeader" style="text-align: center;">
        <img src="http://123workforce.magictimeapps.com/images/newResume/123wf_logo.png" width="170px">
    </div>
    <div class="container mailBody">
        @yield('content')
    </div>
<div class="customFooter">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="footerText" style="text-align: center;">
                <div class="footerImg">
                    <img src="http://123workforce.magictimeapps.com/images/newResume/logo.png" alt="logo">
                </div><br/>
                Please do not reply to this message.  |  Need help? Visit our <a href="http://123workforce.magictimeapps.com">FAQ</a><br/>
                © 2018 123Workforce | All Rights Reserved<br/><br/>
                <div style="padding-bottom: 20px;">
                    <a href="https://www.facebook.com/123workforce">
                        <img src="http://123workforce.magictimeapps.com/images/newResume/fb.png" alt="fb" width="25px">
                    </a>
                    <a href="https://www.instagram.com/123workforce/">
                        <img src="http://123workforce.magictimeapps.com/images/newResume/instagram.png" alt="insta" width="25px">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
