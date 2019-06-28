<? $showVideo = false;
if(!isset($value['id'])){
    $value['id'] = '';
}
$smallCard = true;
?>

<div class="freelancerCard smallCard">
    <div class="col-lg-12 col-md-12 col-12 resumeCardRight" id="resumeCardRight{{$freelancer->id}}{{$value['id']}}">
        {{-- photo and name + multimedia--}}
        <div class="nameRow">
            <img src="/images/home/forum.svg" alt="" class="contact">
            <div class="imageCol">
                <div class="imageContainer">
                    <?
                    $photoSrc = $freelancer->userData->photo;
                    if(!empty($photoSrc)){
                        if ($photoSrc[0] !== '/' && $photoSrc[0] !== 'h') {
                            $photoSrc = '/' . $photoSrc;
                        }
                    }
                    ?>
                    <img src="{{$photoSrc}}" alt="freelancer" class="freelancerImg">
                </div>
            </div>
            <div class="freelancerCardRight">
                <div class="nameArea">
                    <div class="nameCard">
                        {{$freelancer->firstName}}
                    </div>
                    <div class="jobTitle" id="animatedText{{$freelancer->id}}{{$value['id']}}">
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
            <div class="hireRow showOnlyOnmd">
                <div class="payment-details">
                    <div style="color: white;" >
                        <img src="/images/home/monetization.svg" alt=""><span class="payment-highLight" style="font-weight: bold;"> $ {{intval($freelancer->userData->salary) +5}}
                        </span>hourly rate
                    </div>
                    <div style="color: white;">
                        <img src="/images/home/watch_later.svg" alt="">
                        <span class="payment-highLight" id="maxHours{{$freelancer->id}}{{$value['id']}}" style="font-weight: bold;">{{intval($freelancer->userData->availableHours)}} hours</span> availability
                    </div>
                </div>
                @if($freelancer->userData->availableHours !=0)
                    <div class="text-center cardRow NoDecor">
                        @if(isset($portfolioModal) && !$isClient)
                            <a class="hireCardBtn btn-block showHireSection" href="{{route('client.login')}}">
                                HIRE ME
                            </a>
                        @else
                            <a class="hireCardBtn btn-block showHireSection" href="javascript:void(0)" id="showHireSection{{$freelancer->id}}{{$value['id']}}">
                                HIRE ME
                            </a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
