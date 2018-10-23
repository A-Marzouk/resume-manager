{{-- photo and name + multimedia--}}
<div class="freelancerCard">
    <div class="resumeCardRight">
        <div class="row nameRow">
            <form method="post"
                  action="{{route('freelancer.data.store')}}"
                  enctype="multipart/form-data"
                  class="container freelancerForm"
                  style="display: inherit"
            >
                {{csrf_field()}}

                <div class="col-lg-2 col-6 imageCol">
                    <div class="imageContainer" style="padding: 10px; margin-left: 4px;">
                        <?
                        $photoSrc = $freelancer->userData->photo;
                        if(!empty($photoSrc)){
                            if ($photoSrc[0] !== '/' && $photoSrc[0] !== 'h') {
                                $photoSrc = '/' . $photoSrc;
                            }
                        }
                        ?>
                        <img src="{{$photoSrc}}" alt="freelancer" class="freelancerImg"
                             width="100" height="100">
                        <div class="row">
                            <div class="addImageContainer">
                                <img src="/resumeApp/resources/assets/images/add_photo.png" alt="add photo">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6 freelancerCardLeft">
                    <div class="nameArea">
                        <div class="nameCard">
                            <input type="text" class="form-control cardInput"
                                   id="fullName" name="name"
                                   placeholder="Enter your name.."
                                   value="<?if(empty($name)):?>{{$freelancer->firstName}} {{$freelancer->lastName}}<?else:?>{{$name}}<? endif;?>"
                            >
                        </div>
                        <div class="jobTitle" style="color: white; font-size: 14px; padding-top: 7px;">
                            <?
                            $developer = [
                                'Full-Stack Developer', 'Front-End Developer', 'PHP Developer',
                                'Javascript Developer', '.NET Developer',
                                'iOS Developer', 'Android Developer', 'Swift Developer',
                                'Java Developer','Data Scientist','C C++ Developer' , 'Team Leader' ,
                                'Unity Developer' , 'Ruby Developer','Python Developer' , 'SQL Developer' ,'Wordpress Developer'
                            ];
                            $designer =['UI/UX Designer','UI Designer',' UX Designer',
                                'Illustrator','Motion Graphics','Art Director','Branding',
                                'Graphic Designer',' Web Designer','Game Designer','Digital Artist'];
                            ?>
                            <select class="custom-select"
                                    style="
                                        background-color: rgba(67,103,211,0.5);
                                        background:rgba(67,103,211,0.5) url('/resumeApp/resources/assets/images/white_arrow.png')  no-repeat right .75rem center;
                                        background-size: 19px 11px;
                                        border-radius: 5px;
                                        height: 38px;
                                        border: 1px solid #FFFFFF;
                                        width: 178px;
                                        color: #FDFDFD;
                                        font-family: Roboto;
                                        font-size: 13px;
                                        font-weight: bold;
                                        letter-spacing: 0.09px;
                                        line-height: 15px;"
                                    id="jobTitle" name="jobTitle">
                                <? if($profession == 'Developer'):?>
                                    <option value="" selected disabled>-- Developer --</option>
                                <? foreach($developer as $job):?>
                                    <option value="{{$job}}" <?if($jobTitle == $job):?>selected<?endif;?> >{{$job}}</option>
                                <? endforeach;?>
                                <?else:?>
                                    <option value="" disabled selected>-- Designer --</option>
                                <? foreach($designer as $job):?>
                                    <option value="{{$job}}"<?if($jobTitle == $job):?>selected<?endif;?>>{{$job}}</option>
                                <? endforeach;?>
                                <? endif;?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-8 freelancerCardRight">
                    <div class="row interviewIcons">
                        <div class="col-md-4 jobTitle text-right" style="font-size:12px;color: white; padding-top: 13px; padding-right: 30px;">
                            Your interviews :
                        </div>
                        <div class="col-12 col-lg-4 audioTransArea text-center NoDecor">
                            <a href="javascript:void(0)" style="outline: none;" id="browseBtn">
                                <div class="cardIconsCon ">
                            <span>
                                <img src="/resumeApp/resources/views/customTheme/images/audio_resume_Card.png"
                                     alt="" style="padding-right: 5px; width: 23px;">
                                <span class="audioText">
                                    Upload Audio
                                </span>
                            </span>
                                </div>
                            </a>

                        </div>
                        <div class="col-12 col-lg-4 videoArea NoDecor">
                            <a href="javascript:void(0)" style="outline: none;" class="" id="browseBtnVideo">
                                <div class="cardIconsCon2  text-center">
                            <span>
                                <img src="/resumeApp/resources/views/customTheme/images/video_resume_card.png"
                                     alt="" style="padding-right: 5px; width: 23px;">
                                <span class="audioText">Upload Video</span>
                            </span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="text-center hireRow calculateBox">
                            <div class="hoursBtn NoDecor" style="color:white; background: none; border:none;">
                                <div class="row">
                                    <div class="col-md-2" style="padding: 9px 0 0 0;">
                                        <a href="javascript:void(0)" id="weeksMinus{{$freelancer->id}}" class="weeksMinus">
                                            <img src="/resumeApp/resources/views/customTheme/images/newResume/minus copy 6.png" style="width: 18px; padding-right: 8px;" alt="minus">
                                        </a>
                                    </div>

                                    <div class="col-md-8 textBox">
                                        <span id="numberOfWeeks{{$freelancer->id}}">10</span> $<br/>
                                        <span style="font-size: 13px; font-weight: normal">Hourly Rate</span>
                                    </div>

                                    <div class="col-md-2" style="padding: 9px 0 0 0;">
                                        <a href="javascript:void(0)" id="weeksPlus{{$freelancer->id}}" class="weeksPlus">
                                            <img src="/resumeApp/resources/views/customTheme/images/newResume/plus copy 6.png" style="width: 18px; padding-left: 8px;" alt="plus">
                                        </a>
                                    </div>
                                </div>



                            </div>
                        </div>

                        <div  class="text-center hireRow calculateBox" style="margin-left: 7px;" >
                            <div class="hoursBtn NoDecor" style="color:white; background: none; border:none;">
                                <div class="row">
                                    <div class="col-md-2" style="padding: 9px 0 0 0;">
                                        <a href="javascript:void(0)" id="hoursMinus{{$freelancer->id}}" class="hoursMinus">
                                            <img src="/resumeApp/resources/views/customTheme/images/newResume/minus copy 6.png" style="width: 18px; padding-right: 8px;" alt="minus">
                                        </a>
                                    </div>
                                    <div class="col-md-8 textBox">
                                        <span id="numberOfHours{{$freelancer->id}}">@if($freelancer->userData->availableHours==0) 0 @else {{$freelancer->userData->availableHours}} @endif</span>
                                        hours<br/>
                                        <span style="font-size: 13px; font-weight: normal">Weekly Availability</span>
                                    </div>
                                    <div class="col-md-2" style="padding: 9px 0 0 0;">
                                        <a href="javascript:void(0)" id="hoursPlus{{$freelancer->id}}" class="hoursPlus">
                                            <img src="/resumeApp/resources/views/customTheme/images/newResume/plus copy 6.png" style="width: 18px; padding-left: 8px;" alt="plus">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <input type="file" id="audioFile" class="custom-file-input panelFormInput" name="audioFile" style="width: 1px; height: 1px; opacity: 0; right:145%;">
                <input type="file" id="video_file" class="custom-file-input panelFormInput" name="video_file" style="width: 1px; height: 1px; opacity: 0; right:145%;">
                
            </form>
        </div>
    </div>
</div>

<div class="freelancerCard" style="background: none;">
    <hr>
    <div id="loadingText" class="d-none" style="color:lightseagreen; padding: 10px;">
        <span id="spanTextAudio">
            Processing audio...
        </span>
        <span id="progressAudio"></span>
    </div>
    <div id="loadingTextVideo" class="d-none" style="color:lightseagreen; padding: 10px;">
        <span id="spanTextVideo">
            Processing video...
        </span>
        <span id="progress"></span>
    </div>
</div>