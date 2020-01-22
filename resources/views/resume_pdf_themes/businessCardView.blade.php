<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/pdf" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Business card</title>
    <style>
        @import url(//fonts.googleapis.com/earlyaccess/thabit.css);

        .businessCardWrapper{
            width: 355px;
            height: 204px;
            font-weight: bold;
            font-size: 24px;
            line-height: 32px;
            color: #005BD1;
            border: 1px black solid;
            padding: 17px 24px 20px 24px;
            background-image:url("/images/resume_themes/theme8/card-background.png") ;
            background-size: 405px 243px;
            font-family: 'Thabit', monospace !important;

        }

        .avatar{
            width: 75px;
            height: 75px;
        }

        .info{
            padding-left: 16px;
        }

        .flexrow {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
        }

        .name{
            font-style: normal;
            font-weight: bold;
            font-size: 24px;
            line-height: 32px;
            color: #005BD1;
        }

        .title{
            font-weight: 500;
            font-size: 12px;
            line-height: 16px;
            color: #FFFFFF;
        }

        .phone{
            padding-left: 92px;
        }

        .whatsappIcon{
            width: 12px;
            height: 12px;
            margin-right: 10px;
        }

        .phoneNumber{
            font-style: normal;
            font-weight: bold;
            font-size: 12px;
            line-height: 16px;
            color: #FFFFFF;
            padding-top: 9px;
        }

        .social-icon{
            width: 16px;
            height: 16px;
            margin-right: 25px ;
        }

        .images{
            padding-left: 68px;
            padding-top: 40px;
        }


        /* signature */

        .emailSignature {
            width: 600px;
            height: 150px;
            background-image: url("/images/resume_themes/theme8/emailBackground.png");
            background-size: contain;
            font-family: 'Thabit', monospace !important;
        }
        .emailSignature .wrapper {
            padding: 18px;
            display: flex;
        }
        .emailSignature .signature_avatar img {
            width: 117px;
            height: 117px;
            margin-right: 15px;
        }
        .emailSignature .info {
            display: flex;
            flex-direction: column;
        }
        .emailSignature .info .name_title {
            display: flex;
            align-items: center;
        }
        .emailSignature .info .name_title .name {
            font-style: normal;
            font-weight: bold;
            font-size: 24px;
            line-height: 32px;
            color: #005bd1;
            margin-right: 19px;
        }
        .emailSignature .info .name_title .title {
            margin-left: 19px;
            font-style: normal;
            font-weight: 500;
            font-size: 12px;
            line-height: 16px;
            color: #fff;
        }
        .emailSignature .info .name_title .horizontal-divider {
            height: 24px;
            width: 1px;
            background: rgba(255, 255, 255, 0.38);
        }
        .emailSignature .info .contact {
            margin-top: 26px;
            display: flex;
        }
        .emailSignature .info .contact .phone {
            display: flex;
            align-items: center;
            font-weight: bold;
            font-size: 12px;
            margin-right: 33px;
            margin-bottom: 25px;
            line-height: 16px;
            color: #fff;
            padding-left: 0;
        }
        .emailSignature .info .contact .phone img {
            width: 12px;
            height: 12px;
            margin-right: 10px;
        }
        .emailSignature .info .icons {
            display: flex;
            align-items: flex-end;
            justify-content: flex-end;
        }
        .emailSignature .info .icons img {
            width: 20px;
            height: 20px;
            margin-right: 24px;
        }
        .emailSignature .info .icons img:last-child {
            margin-right: 0;
        }


    </style>
</head>
<body>
<div class="businessCardWrapper">
    <div class="flexrow">
        <div>
            <img class="avatar" alt="" src="/images/resume_themes/theme5/profile.png" >
        </div>
        <div class="info">
            <div class="name">
                Beverly Andrews
            </div>
            <div class="title">
                User interface designer
            </div>
        </div>
    </div>

    <div class="phone">
        <div class="flexrow">
            <div>
                <img src="/images/resume_themes/theme8/whatsapp.svg" alt="" class="whatsappIcon">
            </div>
            <div class="phoneNumber">
                000 0000 000
            </div>
        </div>
    </div>

    <div class="phone">
        <div class="flexrow">
            <div>
                <img src="/images/resume_themes/theme8/email.png" alt="" class="whatsappIcon">
            </div>
            <div class="phoneNumber">
                BeverlyA@gmail.com
            </div>
        </div>
    </div>


    <div class="flexrow images">
        <img src="/images/resume_themes/theme8/workforce.png" alt="" class="social-icon">
        <img src="/images/resume_themes/theme8/behance (1).png" alt="" class="social-icon">
        <img src="/images/resume_themes/theme8/dribbble.png" alt="" class="social-icon">
        <img src="/images/resume_themes/theme8/instagram.png" alt="" class="social-icon">
        <img src="/images/resume_themes/theme8/XMLID_801_.png" alt="" class="social-icon">
        <img src="/images/resume_themes/theme8/icon.png" alt="" class="social-icon">
    </div>

</div>

<br>

    <div class="emailSignature">
        <div class="wrapper d-flex">
            <div class="signature_avatar">
                <img src="/images/resume_themes/theme5/profile.png" alt="">
            </div>
            <div class="info">
                <div class="name_title">
                    <div class="name">
                        Beverly Andrews
                    </div>
                    <div class="horizontal-divider"></div>
                    <div class="title">
                        User interface designer
                    </div>
                </div>
                <div class="contact">
                    <div class="phone">
                        <img src="/images/resume_themes/theme8/whatsapp.png" alt="">
                        <div>
                            000 0000 000
                        </div>
                    </div>
                    <div class="phone">
                        <img src="/images/resume_themes/theme8/email.png" alt="">
                        <div>
                            BeverlyA@gmail.com
                        </div>
                    </div>
                </div>
                <div class="icons">
                    <img src="/images/resume_themes/theme8/workforce.png" alt="" style="width: 21px; height: 21px;">
                    <img src="/images/resume_themes/theme8/behance (1).png" alt="" style="width: 29px; height: 18px;">
                    <img src="/images/resume_themes/theme8/dribbble.png" alt="" style="width: 21px; height: 22px;">
                    <img src="/images/resume_themes/theme8/instagram.png" alt="" style="width: 21px; height: 21px;">
                    <img src="/images/resume_themes/theme8/XMLID_801_.png" alt="" style="width: 21px; height: 21px;">
                    <img src="/images/resume_themes/theme8/icon.png" alt="" style="width: 14px; height: 20px;">
                </div>
            </div>
        </div>
    </div>

</body>
</html>
