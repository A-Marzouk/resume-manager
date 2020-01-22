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
            background-size: cover;
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


    </style>
</head>
<body>
<div class="businessCardWrapper">
    <div class="flexrow">
        <div>
            <img class="avatar" alt="" src="{{public_path().'/images/resume_themes/theme5/profile.png'}}" >
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
                <img src="{{public_path().'/images/resume_themes/theme8/whatsapp.svg'}}" alt="" class="whatsappIcon">
            </div>
            <div class="phoneNumber">
                000 0000 000
            </div>
        </div>
    </div>

    <div class="phone">
        <div class="flexrow">
            <div>
                <img src="{{public_path().'/images/resume_themes/theme8/email.svg'}}" alt="" class="whatsappIcon">
            </div>
            <div class="phoneNumber">
                BeverlyA@gmail.com
            </div>
        </div>
    </div>


    <div class="flexrow images">
        <img src="{{public_path().'/images/resume_themes/theme8/workforce.svg'}}" alt="" class="social-icon">
        <img src="{{public_path().'/images/resume_themes/theme8/behance (1).svg'}}" alt="" class="social-icon">
        <img src="{{public_path().'/images/resume_themes/theme8/dribbble.svg'}}" alt="" class="social-icon">
        <img src="{{public_path().'/images/resume_themes/theme8/instagram.svg'}}" alt="" class="social-icon">
        <img src="{{public_path().'/images/resume_themes/theme8/XMLID_801_.svg'}}" alt="" class="social-icon">
        <img src="{{public_path().'/images/resume_themes/theme8/icon.svg'}}" alt="" class="social-icon">
    </div>

</div>
</body>
</html>
