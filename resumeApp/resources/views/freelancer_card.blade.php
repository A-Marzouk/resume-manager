<? $showVideo = true;
   if(!isset($value['id'])){
       $value['id'] = '';
   }

   $smallCard = false ;
   if(!isset($freelancer->id)){
       return;
   }
?>
<div class="freelancerCard" id="card{{$freelancer->id}}{{$value['id']}}">

    <div class="row">

        <div class="col-lg-12 col-md-12 col-12 resumeCardRight" id="resumeCardRight{{$freelancer->id}}{{$value['id']}}">
            <div class="showOnlyOnmd">
                @include('freelancer_card_includes.main_card_info')
            </div>

            <div class="showOnlyOnsm">
                @include('freelancer_card_includes.main_card_info_mob')
            </div>

            @include('freelancer_card_includes.skills')

            <div id="portfolioFull{{$freelancer->id}}{{$value['id']}}">
                @include('freelancer_card_includes.navRow')
                @include('freelancer_card_includes.portfolio')
            </div>
            <div class="d-none" id="hireSection{{$freelancer->id}}{{$value['id']}}">
                @include('freelancer_card_includes.hireSection')
            </div>

        </div>

    </div>

</div>


    {{-- education and work experience --}}
    <div class="row resumeExpand d-none" id="area_viewEducationBtn{{$freelancer->id}}{{$value['id']}}">
        <div id="educationContent{{$freelancer->id}}{{$value['id']}}" class="education about addScroll">
            <div class="row" style="padding-top: 35px;">
                <div class="col-12 educationSection">
                    <?php
                    $educations = $freelancer->educationsHistory;
                    ?>
                    <div class="aboutText">
                        <? foreach ($educations as $education):?>
                        <div class="row">
                            <div class="col-md-12 aboutSubText">
                                <div class="title work">
                                    <span class="circle"></span>
                                    {{$education->school_title}}
                                </div>
                                <div class="year"><span class="work">
                                                {{date('F Y', strtotime($education->date_from))}}
                                        <? if($education->currently_learning):?>
                                        - Present
                                        <? else: ?>
                                        - {{date('F Y', strtotime($education->date_to))}}
                                        <? endif;?>
                                            </span>
                                </div>
                                <div class="desc">{{$education->description}}</div>
                            </div>
                        </div>
                        <? endforeach;?>
                    </div>
                </div>
            </div>
        </div>
        <hr style="width: 85%">
        {{-- work exp --}}
        <div id="workContent{{$freelancer->id}}{{$value['id']}}" class="education about">
            <div class="row" style="padding-top: 35px;">
                <div class="col-12 educationSection">
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

    </div>
    <br>
{{-- modals --}}
    {{-- audio div content --}}

    <div id="audioContent{{$freelancer->id}}{{$value['id']}}" class="d-none">
        <?
        $valid = true;
        $notValidText = 'NOT-VALID-LINK';
        if ($freelancer->userData->audio == $notValidText) {
            $valid = false;
        }
        $audioSrc = "";
        if (!empty(trim($freelancer->userData->audioFile))) {
            $audioSrc = '/'.$freelancer->userData->audioFile;
        } else {
            if ($valid) {
                $audioSrc = "https://drive.google.com/uc?export=download&id=" . $freelancer->userData->audio . "&key=AIzaSyC0bK_7ASw3QylYDzs_Pqo_TeoI7jfFj8M";
            } else {
                $audioSrc = "";
            }
        }
        ?>
        <div class="row" style="border-bottom: 1px solid whitesmoke; padding-bottom: 25px;">
            <div class="col-lg-11 col-11 text-left" style="padding: 25px 0 0 20px;">
                 <span>
                    <img src="/resumeApp/resources/views/customTheme/images/audio_blue.png"
                         alt="" style="padding-right: 14px; width: 34px;">
                    <span class="audioText" style="color: #4E75E8;">Audio & Text Interview</span>
                </span>
            </div>
            <div class="col-lg-1 col-1 text-center NoDecor" style="padding: 24px 0 0 0;">
                <a href="javascript:void(0)" class="audioText audioDismiss" style="color: #4E75E8; font-size: large;" id="audio_dismiss{{$freelancer->id}}{{$value['id']}}"> x </a>
            </div>
        </div>
        <div class="row card-audio-con">
            <div class="col-md-10 offset-md-1 text-center">
                <audio controls style="width: 100%">
                    <source src="{{$audioSrc}}" type="audio/ogg">
                    Your browser does not support the audio element.
                </audio>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="transcript">
                        @if(!empty($freelancer->userData->audio_transcript))
                            {{$freelancer->userData->audio_transcript}}
                        @else
                            DEMO TEXT <br/><br/>
                            One Easy-To-Use Cloud hotel software offering next-gen capabilities needed by hotels to
                            simplify reservations, improve operating efficiency and maximize revenue. iOS + Android
                            + Web-based Project Overview: This system is built in detail with an easy-to-use
                            <br/><br/>

                            nterface keeping in mind the variety of ages that will be using it. <br/><br/>We build
                            the web-based app using the same design principles used on old offline softwares. We
                            also implemented the latest trends, making it usable on touch-screen displays.
                            The app is also responsive and we made sure that anyone can view it on any screen size
                            without losing any type of information.
                            The mobile app offers the same options.<br/><br/>
                            Our user testings show that the same tasks were completed in the same time on mobile and
                            web.
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- video div content--}}

    <div id="videoContent{{$freelancer->id}}{{$value['id']}}" class="d-none">
        <div class="row" style="border-bottom: 1px solid whitesmoke; padding-bottom: 25px;">
            <div class="col-lg-11 col-11 text-left" style="padding: 25px 0 0 20px;">
                 <span>
                    <img src="/resumeApp/resources/views/customTheme/images/video_blue.png"
                         alt="" style="padding-right: 14px; width: 34px;">
                    <span class="audioText" style="color: #4E75E8;">Video Interview</span>
                </span>
            </div>
            <div class="col-lg-1 col-1 text-center NoDecor" style="padding: 24px 0 0 0;">
                <a href="javascript:void(0)" class="audioText audioDismiss" style="color: #4E75E8; font-size: large;" id="audio_dismiss{{$freelancer->id}}{{$value['id']}}"> x </a>
            </div>
        </div>
        <div class="row">
            @if($showVideo)
                @if($freelancer->userData->video_file !== null)
                    <div class="row card-audio-con" style="background-color: white;">
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
                                <iframe src="/{{$freelancer->userData->video}}" frameborder="1"
                                        allow="encrypted-media" allowfullscreen width="100%" height="auto">

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


    {{-- references content --}}
    <div id="referencesContent{{$freelancer->id}}{{$value['id']}}" class="d-none">
        <div class="row" style="border-bottom: 1px solid whitesmoke; padding-bottom: 25px;">
                <div class="col-lg-11 col-11 text-left" style="padding: 25px 0 0 20px;">
                 <span>
                     <img src="/resumeApp/resources/views/customTheme/images/comment-512.png"
                          alt="" style="padding-right: 14px; width: 34px;">
                    <span class="audioText" style="color: #4E75E8;">  References & Testimonials</span>
                </span>
                </div>
                <div class="col-lg-1 col-1 text-center NoDecor" style="padding: 24px 0 0 0;">
                    <a href="javascript:void(0)" class="audioText audioDismiss" style="color: #4E75E8; font-size: large;" id="audio_dismiss{{$freelancer->id}}{{$value['id']}}"> x </a>
                </div>
</div>
        <div style="padding-bottom: 35px;">
            @foreach($freelancer->references as  $reference)
                <div class="row">
                    <div class="col-md-12 aboutSubText">
                        <div class="title work">
                            <span class="circle"></span>
                            {{$reference->title}}
                        </div>
                        <div class="year">
                        <span class="work">
                            {{$reference->company}}
                        </span>
                        </div>
                        <div class="year">
                        <span class="work">
                            {{$reference->email}}
                        </span>
                        </div>
                        <div class="year">
                        <span class="work">
                            {{$reference->phone}}
                        </span>
                        </div>
                        <div class="desc">{{$reference->details}}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- default content --}}

    <div id="defaultContent{{$freelancer->id}}{{$value['id']}}" class="d-none">
        <div class="showOnlyOnmd">
            @include('freelancer_card_includes.main_card_info')
        </div>

        <div class="showOnlyOnsm">
            @include('freelancer_card_includes.main_card_info_mob')
        </div>

        @include('freelancer_card_includes.skills')
        <div id="portfolioFull{{$freelancer->id}}{{$value['id']}}">
            @include('freelancer_card_includes.navRow')
            @include('freelancer_card_includes.portfolio')
        </div>
        <div class="d-none" id="hireSection{{$freelancer->id}}{{$value['id']}}">
            @include('freelancer_card_includes.hireSection')
        </div>

    </div>
