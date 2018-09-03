<? $showVideo = false ; ?>

<div class="freelancerCard" id="card{{$freelancer->id}}">
    {{-- photo and name + multimedia--}}
    <div class="row">
        <div class="col-lg-5 col-md-12 freelancerCardLeft">
            <div class="row">
                <div class="col-lg-4 col-6 imageContainer">
                    <img src="{{$freelancer->userData->photo}}" alt="freelancer" class="freelancerImg"
                         width="100" height="100">

                </div>
                <div class="col-lg-8 col-6 nameArea">
                    <div class="nameCard">
                        {{$freelancer->firstName}} {{$freelancer->lastName}}
                    </div>
                    <div class="jobTitle">
                        {{$freelancer->userData->jobTitle}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 offset-lg-1 col-md-12 freelancerCardRight">
            <div class="row interviewIcons">
                <div class="cardLabel_interviews col-md-6 col-4">Recorded interviews</div>
                <div class="col-md-4 col-4 audioTransArea">
                    <div class="cardIconsCon">
                        <a href="javascript:void(0)" data-toggle="modal"
                           data-target="#{{$freelancer->id}}_audio_modal" style="outline: none;">
                                                                                <span style="border-right: 2px white solid; padding-right: 5px">
                                                                                    <img src="/resumeApp/resources/views/customTheme/images/transcript.png"
                                                                                         alt="" width="20px;">
                                                                                </span>
                            <span style="padding-left: 5px;">
                                                                                        <img src="/resumeApp/resources/views/customTheme/images/mic.png"
                                                                                             alt="" width="20px">
                                                                                </span>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 col-2 videoArea">
                    <div class="cardIconsCon2">
                        <a href="javascript:void(0)" data-toggle="modal"
                           data-target="#{{$freelancer->id}}_video_modal" style="outline: none;">
                                                                                <span style="padding: 5px;">
                                                                                    <img src="/resumeApp/resources/views/customTheme/images/video.png"
                                                                                         alt="" width="25px">
                                                                                </span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- end of photo and multimedia --}}
    <hr style="width: 90%;">
    {{-- Pricing and skills --}}
    <div class="row container">
        <div class="col-lg-3 col-md-12">
            <div class="cardLabel">Pricing:</div>
            <div class="nameCard" style="padding-left: 0;">
                <div class="row">
                    <div class="col-6 col-md-12">
                        ${{intVal($freelancer->userData->salary) +5}}/hour
                    </div>
                    <div class="col-6 col-md-12">
                        ${{$freelancer->userData->salary_month}}/month
                    </div>
                </div>
            </div>
            {{-- stripe goes here --}}
            <form action="/stripe/payments/pay" method="POST" id="stripeForm{{$freelancer->id}}">
                {{ csrf_field() }}
                <?
                $userRate = $freelancer->userData->salary ;
                $hours =10 ;
                $amountToPay = ( intval($userRate) +5 ) * $hours * 100 ;
                ?>
                <input type="hidden" value="{{$amountToPay}}" name="amountToPay">
                <input type="hidden" value="{{$freelancer->userData->name}}" name="freelancerName">
                <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_8Pd2lN3so4z5vBOP98MgNcms"
                        data-amount="{{$amountToPay}}"
                        data-name="Hire  {{$freelancer->userData->name}}"
                        data-description="for 10 hours"
                        data-image="/resumeApp/resources/views/customTheme/images/newResume/logo.png"
                        data-locale="auto">
                </script>
                <script>
                    document.getElementsByClassName("stripe-button-el")[0].style.display = 'none';
                </script>
                <div class="row text-center hireBtnArea">
                    <div class="buttonMain whiteBg col-md-10 col-8 offset-md-0 offset-2">
                        <button class="hireBtn btn-block hire" type="submit">Hire Me</button>
                    </div>
                </div>
            </form>
            {{-- stripe ends here--}}
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="cardLabel">Skills:</div>
            <div class="skillsCard">
                {{$freelancer->userData->design_skills_checkbox}}
            </div>
            <br/>
            <div class="panelFormLabel" style="	color: #697786;">
                <div class="cardLabel" style="padding-bottom: 15px;">No.hours/week available:</div>
                <div class="">
                    <div class="form-group">
                        <? $workingHours = ['10 Hours per Week', '20 Hours per Week', '30 Hours per Week', '40 Hours per Week'];?>
                        <? $k = 1 ?>
                        <? $availableHoursCheckBox = explode(',', $freelancer->userData->availableHours);?>
                        <div class="form-check">
                            @foreach($workingHours as $option)
                                <label class="form-check-label col-md-2 checkBoxContainer checkBoxText"
                                       <? if(!in_array($option, $availableHoursCheckBox)): ?> style="color: lightgray;" <?endif;?>>{{str_replace('per Week','',$option)}}
                                    <input class="form-check-input" id="hours{{$k}}" type="checkbox"
                                           name="availableHours[]" value="{{$option}}"
                                           <? if(in_array($option, $availableHoursCheckBox)): ?> checked
                                           <?endif;?> disabled>
                                    <span class="checkmark"></span>
                                </label>
                                <? $k++; ?>
                            @endforeach
                        </div>
                    </div>  <!-- Hours availabel -->
                </div>
            </div>
        </div>
    </div>
    {{-- end of pricing and skills --}}

    {{-- expand btns--}}
    <div class="row" style="margin-top: 15px ; border-top:1px solid whitesmoke; ">
        <div class="col-md-6 col-6 border-right NoDecor dropDownBtnRight" style="background-color: #FDFDFD;">
            <a href="#viewEducationBtn{{$freelancer->id}}" id="viewPortfolioBtn{{$freelancer->id}}"
               class="viewPortfolioLink">
                <div class="cardLabel_interviews" style="padding-bottom: 10px; height:52px;">
                    <img src="/resumeApp/resources/views/customTheme/images/portfolio_NOT_active.png"
                         alt="read more arrow" width="18px" id="portfolioBtnImg" class="d-none d-md-inline">
                    <span class="dropDownBtnText">View Portfolio </span>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-6 dropDownBtnLeft NoDecor" style="background-color: #FDFDFD;">
            <a href="#viewEducationBtn{{$freelancer->id}}" id="viewEducationBtn{{$freelancer->id}}"
               class="viewEducationLink">
                <div class="cardLabel_interviews" style="padding-bottom: 10px; height:52px;">
                    <img src="/resumeApp/resources/views/customTheme/images/newResume/what_i_do.png"
                         alt="read more arrow" width="18px" id="workBtnImg" class="d-none d-md-inline">
                    <span class="dropDownBtnText">Work/Education</span>
                </div>
            </a>
        </div>
    </div>
    {{-- end of expand btns --}}
</div>

{{-- resume expanded --}}
{{-- portfolio --}}
<div class="row resumeExpand d-none" id="area_viewPortfolioBtn{{$freelancer->id}}">
    <div class="worksSection" style="margin-top: 0;">
        <div class="firstPart" style="background: none; padding-top: 0;">
            <?
            $workExamples = $freelancer->projects;
            $i = 0;
            $maxNumberOfWorks = 50;
            $firstSlideWorks = [];
            $secondSlideWorks = [];
            $thirdSlideWorks = [];
            ?>
            @if($workExamples)
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <? foreach ($workExamples as $workExample):?>
                            <? if ($i >= $maxNumberOfWorks) {
                                break;
                            }
                            if (!$workExample->isActive) {
                                continue;
                            }

                            if ($i < 4) {
                                $firstSlideWorks[] = $workExample;
                            } elseif ($i < 8) {
                                $secondSlideWorks[] = $workExample;
                            } elseif ($i < 12) {
                                $thirdSlideWorks[] = $workExample;
                            }
                            ?>
                            {{-- modal --}}
                            <div class="modal fade" id="works{{$workExample->id}}Modal" tabindex="-1"
                                 role="dialog"
                                 aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document" style="">
                                    <div class="modal-content modal-mobile-resume" data-dismiss="modal" aria-label="Close">
                                        <div class="modal-body" style="padding: 0;">
                                            <div class="row">
                                                <div class="col-md-9" style="padding: 0;">
                                                    <img src="/{{$workExample->mainImage}}" alt=""
                                                         width="100%" height="auto">
                                                    <?
                                                    // more images
                                                    $moreImagesArr = explode(',', $workExample->images);
                                                    foreach($moreImagesArr as $image){
                                                    if(!empty(trim($image))){
                                                    ?>
                                                    <img src="{{$image}}" alt="" width="100%" height="auto">
                                                    <?}
                                                    }?>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group" style="padding-top: 25px;">
                                                        <label class="panelFormLabel"> Description
                                                            <hr>
                                                        </label><br/>
                                                        {{$workExample->projectDesc}}
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="panelFormLabel"> Link
                                                            <hr>
                                                        </label><br/>
                                                        <a href="{{$workExample->link}}">{{$workExample->link}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <? $i++;?>
                            <? endforeach;?>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    {{-- works section carousel --}}

    <div id="carouselExampleControls" class="carousel slide d-none d-md-block" data-ride="carousel" data-interval="false">
        <div class="carousel-inner">
            @if(!empty($firstSlideWorks))
                <div class="carousel-item active">
                    <div class="row">
                        @foreach($firstSlideWorks as $workExample)
                            <div class="col-md-6">
                                <div class="workCard" style="margin-left: 0">
                                    <div class="workImg"
                                         style="height: 290px; overflow: hidden; border-bottom:1px solid lightgray;">
                                        <a href="javascript:void(0)" data-toggle="modal"
                                           data-target="#works{{$workExample->id}}Modal">
                                            <img src="/{{$workExample->mainImage}}" alt="work img"
                                                 width="260">
                                        </a>
                                    </div>
                                    <div class="workTitle">
                                        <div class="row">
                                            <div class="col-md-9">
                                                {{$workExample->projectName}}
                                            </div>
                                            <a class="col-md-2" href="javascript:void(0)"
                                               data-toggle="modal"
                                               data-target="#works{{$workExample->id}}Modal"
                                               style="outline: none;">
                                                <img src="/resumeApp/resources/views/customTheme/images/newResume/link.png"
                                                     alt="view work">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            @if(!empty($secondSlideWorks))
                <div class="carousel-item">
                    <div class="row">
                        @foreach($secondSlideWorks as $workExample)
                            <div class="col-md-6">
                                <div class="workCard" style="margin-left: 0">
                                    <div class="workImg"
                                         style="height: 290px; overflow: hidden; border-bottom:1px solid lightgray;">
                                        <a href="javascript:void(0)" data-toggle="modal"
                                           data-target="#works{{$workExample->id}}Modal">
                                            <img src="/{{$workExample->mainImage}}" alt="work img"
                                                 width="260">
                                        </a>
                                    </div>
                                    <div class="workTitle">
                                        <div class="row">
                                            <div class="col-md-9">
                                                {{$workExample->projectName}}
                                            </div>
                                            <a class="col-md-2" href="javascript:void(0)"
                                               data-toggle="modal"
                                               data-target="#works{{$workExample->id}}Modal"
                                               style="outline: none;">
                                                <img src="/resumeApp/resources/views/customTheme/images/newResume/link.png"
                                                     alt="view work">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            @if(!empty($thirdSlideWorks))
                <div class="carousel-item row">
                    <div class="row">
                        @foreach($thirdSlideWorks as $workExample)
                            <div class="col-md-6">
                                <div class="workCard" style="margin-left: 0">
                                    <div class="workImg"
                                         style="height: 290px; overflow: hidden; border-bottom:1px solid lightgray;">
                                        <a href="javascript:void(0)" data-toggle="modal"
                                           data-target="#works{{$workExample->id}}Modal">
                                            <img src="/{{$workExample->mainImage}}" alt="work img"
                                                 width="260">
                                        </a>
                                    </div>
                                    <div class="workTitle">
                                        <div class="row">
                                            <div class="col-md-9">
                                                {{$workExample->projectName}}
                                            </div>
                                            <a class="col-md-2" href="javascript:void(0)"
                                               data-toggle="modal"
                                               data-target="#works{{$workExample->id}}Modal"
                                               style="outline: none;">
                                                <img src="/resumeApp/resources/views/customTheme/images/newResume/link.png"
                                                     alt="view work">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
    {{-- end of works section --}}

    {{-- carousel on phone --}}



    <div id="carouselExampleControls_mobile" class="carousel slide d-md-none" data-ride="carousel" data-interval="false">
        <div class="carousel-inner">
            <? $i=1;?>
            @foreach($workExamples as $workExample)
                <div class="carousel-item <?if($i==1):?> active <? endif;?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="workCard" style="margin-left: 0">
                                <div class="workImg"
                                     style="height: 190px; overflow: hidden; border-bottom:1px solid lightgray;">
                                    <a href="javascript:void(0)" data-toggle="modal"
                                       data-target="#works{{$workExample->id}}Modal">
                                        <img src="/{{$workExample->mainImage}}" alt="work img"
                                             width="260">
                                    </a>
                                </div>
                                <div class="workTitle">
                                    <div class="row">
                                        <div class="col-md-9">
                                            {{$workExample->projectName}}
                                        </div>
                                        <a class="col-md-2" href="javascript:void(0)"
                                           data-toggle="modal"
                                           data-target="#works{{$workExample->id}}Modal"
                                           style="outline: none;">
                                            <img src="/resumeApp/resources/views/customTheme/images/newResume/link.png"
                                                 alt="view work">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <? $i++;?>
            @endforeach
        </div>
    </div>
    {{-- carousel end on phone--}}
    {{-- carousel on phone controller--}}
    <div class="row d-md-none" style="padding-top: 25px; padding-bottom: 25px; width: 100%;">
        <div class="col-md-6 col-6 NoDecor text-center">
            <a href="#carouselExampleControls_mobile" role="button" data-slide="prev" class="cardLabel_interviews"
               style="color:#697786;">
                <img src="/resumeApp/resources/views/customTheme/images/newResume/prev.png"
                     alt="prev" width="75px">
            </a>
        </div>
        <div class="col-md-6 col-6 NoDecor text-center">
            <a href="#carouselExampleControls_mobile" role="button" data-slide="next" class="cardLabel_interviews"
               style="color:#697786;">
                <img src="/resumeApp/resources/views/customTheme/images/newResume/next.png"
                     alt="next" width="75px">
            </a>
        </div>
    </div>
    {{-- carousel on phone controller end --}}
    {{-- carousel controls --}}

    <div class="row d-none d-md-flex" style="padding-top: 25px; padding-bottom: 25px; width: 100%;">
        <div class="col-md-6 NoDecor text-left">
            <a href="#carouselExampleControls" role="button" data-slide="prev" class="cardLabel_interviews"
               style="color:#697786;">
                <img src="/resumeApp/resources/views/customTheme/images/newResume/prev.png"
                     alt="prev" width="75px">
            </a>
        </div>
        <div class="col-md-6 NoDecor text-right">
            <a href="#carouselExampleControls" role="button" data-slide="next" class="cardLabel_interviews"
               style="color:#697786;">
                <img src="/resumeApp/resources/views/customTheme/images/newResume/next.png"
                     alt="next" width="75px">
            </a>
        </div>
    </div>
    {{--end of carousel controller--}}

    {{-- vc btns row --}}
    <div class="row fullCV" style="width: 100%;">
        <div class="col-12 col-md-4 offset-md-4 text-center">
            <div class="buttonMain whiteBg" style="padding: 0; margin: 0;">
                <a href="#" class="hireBtn btn-block hire">Chat</a>
            </div>
        </div>
    </div>

    {{-- un expand btns --}}
    <div class="row" style="border-top:1px solid whitesmoke; width: 100%;">
        <div class="col-md-12 text-center NoDecor" style="background-color: #FDFDFD;">
            <a href="#card{{$freelancer->id}}" id="minimize{{$freelancer->id}}" class="Minimize">
                <div class="cardLabel_interviews" style="padding-top: 15px;height:52px;">
                    <span style="padding-right: 6px; color: grey;"></span>
                    <img src="/resumeApp/resources/views/customTheme/images/close_menu.png"
                         alt="read more arrow" width="11px" id="portfolioBtnImg">
                </div>
            </a>
        </div>
    </div>
    {{-- end of un expand btns --}}

</div>
{{-- education --}}
<div class="row resumeExpand d-none" id="area_viewEducationBtn{{$freelancer->id}}">
    <div id="about" class="education">
        <div class="row">
            <div class="offset-lg-1 col-lg-5 col-md-6 educationSection">
                <img src="/resumeApp/resources/views/customTheme/images/newResume/education.png"
                     alt="aboutImg" width="30px;">
                <span class="aboutText">EDUCATION</span>
                <div class="aboutText">
                    <? if(!empty($freelancer->userData->eduTitle1)):?>
                    <div class="row">
                        <div class="col-md-12 aboutSubText">
                            <div class="year"><span
                                        class="circle"></span> {{$freelancer->userData->eduYear1}}</div>
                            <div class="title">{{$freelancer->userData->eduTitle1}}</div>
                            <div class="desc">{{$freelancer->userData->eduDesc1}}</div>
                        </div>
                    </div>
                    <br/>
                    <? endif; ?>
                    <? if(!empty($freelancer->userData->eduTitle2)):?>
                    <div class="row">
                        <div class="col-md-10 aboutSubText">
                            <div class="year"><span
                                        class="circle"></span> {{$freelancer->userData->eduYear2}}</div>
                            <div class="title">{{$freelancer->userData->eduTitle2}}</div>
                            <div class="desc">{{$freelancer->userData->eduDesc2}}</div>
                        </div>
                    </div>
                    <br/>
                    <? endif; ?>
                    <? if(!empty($freelancer->userData->eduTitle3)):?>
                    <div class="row">
                        <div class="col-md-10 aboutSubText">
                            <div class="year"><span
                                        class="circle"></span> {{$freelancer->userData->eduYear3}}</div>
                            <div class="title">{{$freelancer->userData->eduTitle3}}</div>
                            <div class="desc">{{$freelancer->userData->eduDesc3}}</div>
                        </div>
                    </div>
                    <? endif; ?>
                </div>
            </div>
            <div class="col-md-6 col-lg-5">
                <img src="/resumeApp/resources/views/customTheme/images/newResume/trainings.png"
                     alt="aboutImg" width="30px;">
                <span class="aboutText">TRAININGS</span>
                <div class="aboutText">
                    <? if(!empty($freelancer->userData->trnTitle1)):?>
                    <div class="row">
                        <div class="col-md-12 aboutSubText">
                            <div class="year"><span
                                        class="circle"></span> {{$freelancer->userData->trnYear1}}</div>
                            <div class="title">{{$freelancer->userData->trnTitle1}}</div>
                            <div class="desc">{{$freelancer->userData->trnDesc1}}</div>
                        </div>
                    </div>
                    <br/>
                    <? endif; ?>
                    <? if(!empty($freelancer->userData->trnTitle3)):?>
                    <div class="row">
                        <div class="col-md-10 aboutSubText">
                            <div class="year"><span
                                        class="circle"></span> {{$freelancer->userData->trnYear2}}</div>
                            <div class="title">{{$freelancer->userData->trnTitle2}}</div>
                            <div class="desc">{{$freelancer->userData->trnDesc2}}</div>
                        </div>
                    </div>
                    <br/>
                    <? endif; ?>
                    <? if(!empty($freelancer->userData->trnTitle3)):?>
                    <div class="row">
                        <div class="col-md-10 aboutSubText">
                            <div class="year"><span
                                        class="circle"></span> {{$freelancer->userData->trnYear3}}</div>
                            <div class="title">{{$freelancer->userData->trnTitle3}}</div>
                            <div class="desc">{{$freelancer->userData->trnDesc3}}</div>
                        </div>
                    </div>
                    <? endif; ?>
                </div>
            </div>
        </div>
    </div>
    <hr style="width: 85%">
    {{-- work exp --}}
    <div id="about" class="education">
        <div class="row">
            <div class="offset-lg-1 col-lg-5 col-md-6 educationSection">
                <img src="/resumeApp/resources/views/customTheme/images/newResume/what_i_do.png"
                     style="padding-bottom: 10px;" alt="aboutImg" width="30px;">
                <span class="aboutText">WORK OVERVIEW</span>
                <?php
                $works = $freelancer->worksHistory;
                ?>
                <div class="aboutText">
                    <? foreach ($works as $work):?>
                    <div class="row">
                        <div class="col-md-12 aboutSubText">
                            <div class="title work">
                                <span class="circle"></span>
                                {{$work->job_title}}
                            </div>
                            <div class="company">{{$work->company}}</div>
                            <div class="year"><span class="work">
                                            {{date('F Y', strtotime($work->date_from))}}
                                    <? if($work->currently_working):?>
                                    - Present
                                    <? else: ?>
                                    - {{date('F Y', strtotime($work->date_to))}}
                                    <? endif;?>
                                        </span>
                            </div>
                            <div class="desc">{{$work->job_description}}</div>
                        </div>
                    </div>
                    <? endforeach;?>
                </div>
            </div>
        </div>
    </div>
    {{-- un expand btns --}}
    <div class="row" style="border-top:1px solid whitesmoke; ">
        <div class="col-md-12 text-center NoDecor" style="background-color: #FDFDFD;">
            <a href="#card{{$freelancer->id}}" id="minimize{{$freelancer->id}}" class="Minimize">
                <div class="cardLabel_interviews" style="padding-top: 15px;height:52px;">
                    <span style="padding-right: 6px; color: grey;"></span>
                    <img src="/resumeApp/resources/views/customTheme/images/close_menu.png"
                         alt="read more arrow" width="11px" id="portfolioBtnImg">
                </div>
            </a>
        </div>
    </div>
    {{-- end of un expand btns --}}
</div>
<br>
{{-- modals --}}
{{-- audio modal--}}
<div class="modal fade" style="background-color:rgba(255, 255, 255, 0.95);" id="{{$freelancer->id}}_audio_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="row">
        <div class="col-md-12 text-center" style="padding-top: 20px;">
            <img src="/resumeApp/resources/views/customTheme/images/newResume/123wf_logo.png" alt="logo" width="250">
        </div>
    </div>
    <div class="modal-dialog modal-lg" role="document" style="max-width: 400px;">
        <div class="modal-content modal-mobile-resume">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6" style="padding-top: 15px;">
                        <div class="row">
                            <div class="col-md-3 col-6">
                                <div class="cardIconsCon">
                                                <span style="border-right: 2px white solid; padding-right: 5px">
                                                    <img src="/resumeApp/resources/views/customTheme/images/transcript.png"
                                                         alt="" width="20px;">
                                                </span>
                                    <span style="padding-left: 5px;">
                                                    <img src="/resumeApp/resources/views/customTheme/images/mic.png"
                                                         alt="" width="20px">
                                                </span>
                                </div>
                            </div>
                            <div class="col-md-8 col-6">
                                <div class="modal-card-name">
                                    {{$freelancer->firstName}}
                                    {{$freelancer->lastName}}
                                </div>
                                <div class="modal-card-subName">
                                    Audio & Transcript
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?
                $valid = true;
                $notValidText = 'NOT-VALID-LINK';
                if ($freelancer->userData->audio == $notValidText) {
                    $valid = false;
                }
                $audioSrc = "";
                if(!empty(trim($freelancer->userData->audioFile))){
                    $audioSrc = $freelancer->userData->audioFile;
                }else{
                    if($valid){
                        $audioSrc = "https://drive.google.com/uc?export=download&id=".$freelancer->userData->audio."&key=AIzaSyC0bK_7ASw3QylYDzs_Pqo_TeoI7jfFj8M";
                    }else{
                        $audioSrc = "" ;
                    }
                }
                ?>
                <div class="row card-audio-con">
                    <div class="col-md-6 offset-md-3 text-center">
                        <audio controls>
                            <source src="{{$audioSrc}}" type="audio/ogg">
                            Your browser does not support the audio element.
                        </audio>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <div class="transcript">
                                DEMO TEXT <br/><br/>
                                One Easy-To-Use Cloud hotel software offering next-gen capabilities needed by hotels to simplify reservations, improve operating efficiency and maximize revenue. iOS + Android + Web-based Project Overview: This system is built in detail with an easy-to-use <br/><br/>

                                nterface keeping in mind the variety of ages that will be using it. <br/><br/>We build the web-based app using the same design principles used on old offline softwares. We also implemented the latest trends, making it usable on touch-screen displays.
                                The app is also responsive and we made sure that anyone can view it on any screen size without losing any type of information.
                                The mobile app offers the same options.<br/><br/>
                                Our user testings show that the same tasks were completed in the same time on mobile and web.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- video modal--}}
<div class="modal fade" style="background-color:rgba(255, 255, 255, 0.95);" id="{{$freelancer->id}}_video_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="row">
        <div class="col-md-12 text-center" style="padding-top: 20px;">
            <img src="/resumeApp/resources/views/customTheme/images/newResume/123wf_logo.png" alt="logo" width="250">
        </div>
    </div>
    <div class="modal-dialog modal-lg" role="document" style="max-width: 400px;">
        <div class="modal-content modal-mobile-resume">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6" style="padding-left: 35px; padding-top: 15px;">
                        <div class="row">
                            <div class="col-md-2 col-6">
                                <div class="cardIconsCon2">
                                    <span style="padding: 5px;">
                                        <img src="/resumeApp/resources/views/customTheme/images/video.png" alt="" width="25px">
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-8 col-6 ">
                                <div class="modal-card-name">
                                    {{$freelancer->firstName}}
                                    {{$freelancer->lastName}}
                                </div>
                                <div class="modal-card-subName">
                                    Video
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($showVideo)
                        @if($freelancer->userData->video_file !== null)
                            <div class="row card-audio-con"  style="background-color: white;">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <video width="100%" id="videoResume" height="auto" controls>
                                            <source src="/{{$freelancer->userData->video_file}}">
                                        </video>
                                    </div>
                                </div>
                            </div>
                        @elseif($freelancer->userData->video !== null)
                            <div class="row card-audio-con" style="background-color: white;">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <iframe src="/{{$freelancer->userData->video}}" frameborder="1" allow="encrypted-media" allowfullscreen width="100%" height="auto">

                                        </iframe>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="row">
                            <div class="col-md-12">
                                <div class="transcript">
                                    Video is coming soon..
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
