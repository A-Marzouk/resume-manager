@extends('layouts.email')

@section('content')
<div class="mailText">
    Hi, nice to meet you<br/><br/>

    If your business has any requirement for sales agents to do Telemarketing now or in the future please don’t hesitate to get in touch.<br/><br/>

    We offer outsourced sales teams to do appointment setting , outbound cold calling / Telesales for your business<br/><br/>


    A short video about us<br/>


    <div class="d-flex justify-content-center w-100">
        <video width="100%" height="320px" controls>
            <iframe width="100%" height="320px"
                    src="http://123workforce.magictimeapps.com/resumeApp/public/videos/sales_video.mp4">
            </iframe>
            <br/>
            <div>
                <a href="http://123workforce.magictimeapps.com/resumeApp/public/videos/sales_video.mp4" style="text-decoration: none">
                    <img src="http://123workforce.magictimeapps.com/resumeApp/public/images/sales.png" height="320px" alt="">
                </a>
            </div>

        </video>
    </div><br/><br>


    An audio of business support agent <br/><br/>

    <div class="col-md-5 text-center">
        <audio id="audioIntro" controls>
            <source src="http://123workforce.magictimeapps.com/resumeApp/public/sounds/Cheska-digital (1).mp3" type="audio/ogg">
            <a href="http://123workforce.magictimeapps.com/resumeApp/public/sounds/Cheska-digital (1).mp3" style="text-decoration: none">
                <img src="http://123workforce.magictimeapps.com/resumeApp/public/images/audio_bar.png" height="38px" alt="">
            </a>
        </audio>
    </div>
    <br/>



    If you would like to use our telemarketing service, you can setup your campaign with us and get started with your sales team today … .<br/>

    <div class="buttonMain col-md-4" style="padding-top: 15px;">
        <a href="http://123workforce.magictimeapps.com/client/register" class="hireBtn btn-block" target="_blank">
            Register
        </a>
    </div>

   <br/><br/>



    Wishing you a great day ahead and sales success !<br/><br/>

    Kindest Regards<br/><br/>

    Skype - <a href="skype:cheska@123workforce.com">cheska@123workforce.com</a><br/>
    Email -  <a href="mailto:cheska@123workforce.com">cheska@123workforce.com</a>

</div>
@endsection