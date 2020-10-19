{{-- photo and name + multimedia--}}
<div class="row nameRow">


    <div class="col-lg-2 col-6 imageCol">
        <div class="imageContainer" style="padding: 10px;">
            <?
            $photoSrc = $freelancer->userData->photo;
            if(!empty($photoSrc)){
                if ($photoSrc[0] !== '/' && $photoSrc[0] !== 'h') {
                    $photoSrc = '/' . $photoSrc;
                }
            }else{
                $photoSrc = '/images/user.png';
            }
            ?>
            <img src="{{$photoSrc}}" alt="freelancer" class="freelancerImg"
                 width="120" height="120">
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-6 freelancerCardLeft">
        <div class="nameArea">
            <div class="nameCard">
                {{$freelancer->firstName}}
            </div>
            <div class="jobTitle" style="color: white; font-size: 14px; padding-top: 7px;" id="animatedText{{$freelancer->id}}{{$value['id']}}">
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


    <div class="col-lg-7 col-md-8 freelancerCardRight d-flex align-items-center">
        @if(!$smallCard)
            <div class="row hireRow w-100">
                <div  class="col-md-4 text-center" style="font-size: 15px; color: white;" >
                    <span style="font-weight: bold;">
                        <?
                            if(isset($profit)){
                                $salary = intval($freelancer->userData->salary) + $profit ;
                            }else{
                                $salary = intval($freelancer->userData->salary);
                            }
                        ?>
                        ${{$salary}}
                    </span>
                    <div class="cardLabel" style="font-size: 13px; font-weight: normal;">Hourly rate</div>
                </div>
                <div class="col-md-4 text-center"  style="font-size: 15px; color: white;">
                    <span id="maxHours{{$freelancer->id}}{{$value['id']}}" style="font-weight: bold;">{{intval($freelancer->userData->availableHours)}} hours</span>
                    <div class="cardLabel" style="font-size: 13px; font-weight: normal;">Weekly Availability</div>
                </div>

                <div class="col-md-4" style="padding: 0;">
                    @if($freelancer->userData->availableHours !=0)
                        <div class="row text-center cardRow NoDecor">
                            @if(isset($portfolioModal) && !$isClient)
                                <a class="hireCardBtn btn-block showHireSection" href="{{route('client.login')}}">
                                    Hire me
                                </a>
                            @else
                                <a class="hireCardBtn btn-block showHireSection" href="javascript:void(0)" id="showHireSection{{$freelancer->id}}{{$value['id']}}">
                                    Hire me
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
        </div>
        @endif
    </div>
</div>