<div class="row cardMainInfo_mob">
    <div class="col-4">
        <div class="imageContainer" style="padding: 20px 10px 10px 10px;">
            <?
            $photoSrc = $freelancer->userData->photo;
            if(!empty($photoSrc)){
                if ($photoSrc[0] !== '/' && $photoSrc[0] !== 'h') {
                    $photoSrc = '/' . $photoSrc;
                }
            }
            ?>
            <img src="{{$photoSrc}}" alt="freelancer" class="freelancerImg"
                 width="90" height="90">
        </div>
    </div>
    <div class="col-5 resumeCardRight">
        <div class="nameArea">
            <div class="nameCard">
                {{$freelancer->firstName}}
            </div>
            <div class="jobTitle" style="font-size: 17px; padding-left: 0; color: #c1d1ff" id="animatedText{{$freelancer->id}}{{$value['id']}}">
                {{$freelancer->userData->jobTitle}}
            </div>
            <div  class="text-left" style="font-size: 15px; color: white; padding-top: 5px;" >
                <div class="cardLabel" style="font-weight: 300; font-size:14px ;">Hourly rate :
                    <span style="font-weight: bold;">
                        ${{intval($freelancer->userData->salary) +5}}
                    </span>
                </div>
            </div>
            <div class="text-left"  style="font-size: 15px; color: white; padding-top: 5px;">
                <div class="cardLabel" style="font-weight: 300; font-size:14px ;">Availability :  <span id="maxHours{{$freelancer->id}}{{$value['id']}}" style="font-weight: bold;">{{intval($freelancer->userData->availableHours)}}h/week</span></div>
            </div>
            <div id="welcomeText{{$freelancer->id}}{{$value['id']}}" class="d-none">
                Hi, I am {{$freelancer->firstName}}, I am a {{$freelancer->userData->jobTitle}}, How can I help
                you ?
            </div>
        </div>
    </div>
    <div class="col-3" style="padding-top: 45px;">
        <div class="text-center cardRow NoDecor">
            <a class="hireCardBtn btn-block showHireSection_mob" href="javascript:void(0)" id="showHireSection_mob{{$freelancer->id}}{{$value['id']}}">
                Hire me
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-6" style="margin-top: -34px; padding-left: 35px;">
            <form action="/chat-room/start_conversation" method="post">
                {{csrf_field()}}
                <input type="hidden" name="freelancer_id" value="{{$freelancer->id}}">
                <input type="submit"  value="CHAT" class="tap-to-chat cursorPointerOnHover" style="background: none; border:none; outline: none;">
            </form>
        </div>
    </div>

</div>


