{{-- photo and name + multimedia--}}
<div class="row nameRow">
    <div class="col-lg-2 text-right">
        <div class="imageContainer" style="padding: 10px;">
            <?
            $photoSrc = $freelancer->userData->photo;
            if(!empty($photoSrc)){
                if ($photoSrc[0] !== '/' && $photoSrc[0] !== 'h') {
                    $photoSrc = '/' . $photoSrc;
                }
            }
            ?>
            <img src="{{$photoSrc}}" alt="freelancer" class="freelancerImg"
                 width="120" height="120">
        </div>
    </div>
    <div class="col-lg-3 col-md-4 freelancerCardLeft">
        <div class="nameArea d-none d-md-block">
            <div class="nameCard">
                {{$freelancer->firstName}} {{$freelancer->lastName}}
            </div>
            <div class="jobTitle" style="color: white; font-size: 17;" id="animatedText{{$freelancer->id}}{{$value['id']}}">
                {{$freelancer->userData->jobTitle}}
            </div>

            <form action="/chat-room/start_conversation" method="post">
                {{csrf_field()}}
                <input type="hidden" name="freelancer_id" value="{{$freelancer->id}}{{$value['id']}}">
                <input type="submit"  value="TAP TO CHAT" class="tap-to-chat cursorPointerOnHover" style="background: none; border:none; outline: none;">
            </form>

            <div id="welcomeText{{$freelancer->id}}{{$value['id']}}" class="d-none">
                Hi, I am {{$freelancer->firstName}}, I am a {{$freelancer->userData->jobTitle}}, How can I help
                you ?
            </div>
        </div>
    </div>
    <div class="col-lg-7 col-md-8 freelancerCardRight">
        @if(!$smallCard)
            <div class="row interviewIcons">
            <div class="col-md-4 jobTitle text-right" style="color: white; padding-top: 13px; padding-right: 30px;">
                View interviews :
            </div>
            <div class="col-12 col-lg-4 audioTransArea text-center NoDecor">
                <a href="javascript:void(0)" id="{{$freelancer->id}}{{$value['id']}}_open_audio" style="outline: none;" class="openAudio">
                    <div class="cardIconsCon ">
                                    <span>
                                        <img src="/resumeApp/resources/views/customTheme/images/audio_resume_Card.png"
                                             alt="" style="padding-right: 14px; width: 34px;">
                                        <span class="audioText">Audio & Text</span>
                                    </span>
                    </div>
                </a>
            </div>
            <div class="col-12 col-lg-4 videoArea NoDecor">
                <a href="javascript:void(0)" id="{{$freelancer->id}}{{$value['id']}}_open_video" style="outline: none;" class="openVideo">
                    <div class="cardIconsCon2  text-center">
                        <span>
                            <img src="/resumeApp/resources/views/customTheme/images/video_resume_card.png"
                                 alt="" style="padding-right: 14px; width: 34px;">
                            <span class="audioText">Video Interview</span>
                        </span>
                    </div>
                </a>
            </div>
        </div>
        @endif
        @if(!$smallCard)
            <div class="row hireRow">
                <div  class="col-md-4 text-center" style="font-size: 15px; color: white;" >
                    ${{intval($freelancer->userData->salary) +5}}
                    <div class="cardLabel" style="font-size: 13px;">Hourly rate</div>
                </div>
                <div class="col-md-4 text-center"  style="font-size: 15px; color: white;">
                    <span id="maxHours{{$freelancer->id}}{{$value['id']}}">{{intval($freelancer->userData->availableHours)}} hours</span>
                    <div class="cardLabel" style="font-size: 13px;">Weekly Availability</div>
                </div>

                <div class="col-md-4">
                    @if($freelancer->userData->availableHours !=0)
                        <div class="row text-center cardRow NoDecor">
                            <a class="hireCardBtn btn-block " href="/stripe/hire?freelancerID={{$freelancer->id}}&hours=10&weeks=4" id="hireMeBtn{{$freelancer->id}}{{$value['id']}}">
                                Hire me
                            </a>
                        </div>
                </div>
            @endif
        </div>
        @endif

    </div>
</div>