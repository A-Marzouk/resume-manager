<? $showVideo = false;
if(!isset($value['id'])){
    $value['id'] = '';
}
$smallCard = true;
?>

<div class="freelancerCard">
    <div class="col-lg-12 col-md-12 col-12 resumeCardRight" id="resumeCardRight{{$freelancer->id}}{{$value['id']}}">
        {{-- photo and name + multimedia--}}
        <div class="row nameRow" style="padding: 0px 5px 0px 5px;">


            <div class="col-lg-2 col-6 imageCol">
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
                         width="96" height="96">
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6 freelancerCardLeft">
                <div class="nameArea">
                    <div class="nameCard" style="padding-top: 26px;">
                        {{$freelancer->firstName}}
                    </div>
                    <div class="jobTitle" style="color: white; font-size: 14px; padding-top: 7px; padding-left: 0;" id="animatedText{{$freelancer->id}}{{$value['id']}}">
                        {{$freelancer->userData->jobTitle}}
                    </div>

                    @if(!$smallCard)
                        <form action="/chat-room/start_conversation" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="freelancer_id" value="{{$freelancer->id}}{{$value['id']}}">
                            <input type="submit"  value="TAP TO CHAT" class="tap-to-chat cursorPointerOnHover" style="background: none; border:none; outline: none;">
                        </form>
                    @endif

                    <div id="welcomeText{{$freelancer->id}}{{$value['id']}}" class="d-none">
                        Hi, I am {{$freelancer->firstName}}, I am a {{$freelancer->userData->jobTitle}}, How can I help
                        you ?
                    </div>
                </div>
            </div>


            <div class="col-lg-7 col-md-8 freelancerCardRight">
                @if(!$smallCard)
                    <div class="row interviewIcons">
                        <div class="col-md-4 jobTitle text-right" style="font-size:12px;color: white; padding-top: 13px; padding-right: 30px;">
                            View interviews :
                        </div>
                        <div class="col-12 col-lg-4 audioTransArea text-center NoDecor">
                            <a href="javascript:void(0)" id="{{$freelancer->id}}{{$value['id']}}_open_audio" style="outline: none;" class="openAudio">
                                <div class="cardIconsCon ">
                        <span>
                            <img src="/resumeApp/resources/views/customTheme/images/audio_resume_Card.png"
                                 alt="" style="padding-right: 5px; width: 23px;">
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
                                 alt="" style="padding-right: 5px; width: 23px;">
                            <span class="audioText">Video</span>
                        </span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif
                <div class="row hireRow showOnlyOnmd" style="margin-top: 35px; margin-bottom: 10px;">
                    <div  class="col-md-5 offset-md-1 col-6 text-center" style="font-size: 15px; color: white;" >
                        <span style="font-weight: bold;">
                            ${{intval($freelancer->userData->salary) +5}}
                        </span>
                        <div class="cardLabel" style="font-size: 13px; font-weight: normal;">Hourly rate</div>
                    </div>
                    <div class="col-md-5 col-6 text-center"  style="font-size: 15px; color: white;">
                        <span id="maxHours{{$freelancer->id}}{{$value['id']}}" style="font-weight: bold;">{{intval($freelancer->userData->availableHours)}} hours</span>
                        <div class="cardLabel" style="font-size: 13px; font-weight: normal;">Weekly Availability</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>