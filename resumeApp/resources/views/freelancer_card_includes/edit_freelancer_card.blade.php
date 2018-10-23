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
                        $defaultSrc = 'resumeApp/resources/views/customTheme/images/add_profile_photo.png';

                        $photoSrc = $freelancer->userData->photo;
                        if(!empty($photoSrc)){
                            if ($photoSrc[0] !== '/' && $photoSrc[0] !== 'h') {
                                $photoSrc = '/' . $photoSrc;
                            }
                        }else{
                            $photoSrc = $defaultSrc;
                        }
                        ?>
                        <img src="{{$photoSrc}}" alt="freelancer" class="freelancerImg"
                             width="100" height="100" id="photoPreview_card">
                        <div class="row NoDecor">
                            <a class="addImageContainer" href="javascript:void(0)" id="addPhoto_card">
                                <img src="/resumeApp/resources/assets/images/add_photo.png" alt="add photo">
                            </a>
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
                                        <a href="javascript:void(0)" id="dollarsMinus{{$freelancer->id}}" class="dollarsMinus">
                                            <img src="/resumeApp/resources/views/customTheme/images/newResume/minus copy 6.png" style="width: 18px; padding-right: 8px;" alt="minus">
                                        </a>
                                    </div>

                                    <div class="col-md-8 textBox">
                                        <span id="numberOfDollars{{$freelancer->id}}">10</span> $<br/>
                                        <span style="font-size: 13px; font-weight: normal">Hourly Rate</span>
                                    </div>

                                    <div class="col-md-2" style="padding: 9px 0 0 0;">
                                        <a href="javascript:void(0)" id="dollarsPlus{{$freelancer->id}}" class="dollarsPlus">
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
                <input type="file" class="custom-file-input" name="photo" id="photoInput" style="width: 1px; height: 1px; opacity: 0; right:145%;">
                <input type="text" class="form-control panelFormInput d-inline-block" id="salary{{$freelancer->id}}" name="salary" style="width: 1px; height: 1px; opacity: 0; right:145%;" value="<? if(!empty($salary)){echo $salary;}else{echo '';}?>">
            </form>
        </div>
    </div>

    {{-- Skills area --}}
    <div id="nav-taps-resume">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link text-center active" href="#languagesTab{{$freelancer->id}}" role="tab" data-toggle="tab">
                    Programming Languages
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-center" href="#databases{{$freelancer->id}}" role="tab" data-toggle="tab">
                    Frameworks / Databases
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-center" href="#skillsTab{{$freelancer->id}}" role="tab" data-toggle="tab">
                    Design Skills
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-center" href="#software{{$freelancer->id}}" role="tab" data-toggle="tab">
                    Software
                </a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active firstItem" id="languagesTab{{$freelancer->id}}">
                <div class="row" style="padding-top: 17px;padding-bottom: 16px;background: #fdfdfd;">
                    <div class="col-md-12  text-center">
                        <span class="skillsCard">
                           No skills found 1
                        </span>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="databases{{$freelancer->id}}">
                <div class="text-center panelFormLabel" style="padding-top: 17px; padding-bottom: 17px;">
                    No skills found 2
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="skillsTab{{$freelancer->id}}">
                <div class="row" style="padding-top: 17px;padding-bottom: 16px;background: #fdfdfd;">
                    <div class="col-md-12  text-center">
                        <span class="skillsCard">
                            No skills found 3
                        </span>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="software{{$freelancer->id}}">
                <div class="text-center panelFormLabel" style="padding-top: 17px; padding-bottom: 17px;">
                    No skills found 4
                </div>
            </div>
        </div>
    </div>


    <div id="nav-taps-resume-card">
        <ul class="nav nav-tabs navRow" role="tablist">
            <li class="offset-md-3 col-md-2 nav-item NoDecor">
                <a class="nav-link navTab text-center active" href="#portfolio{{$freelancer->id}}" role="tab" data-toggle="tab">
                    Portfolio
                </a>
            </li>
            <li class="nav-item col-md-2 NoDecor">
                <a class="nav-link navTab text-center" href="#work{{$freelancer->id}}" role="tab" data-toggle="tab">
                    Work
                </a>
            </li>
            <li class="nav-item col-md-2 NoDecor">
                <a class="nav-link navTab text-center" href="#education{{$freelancer->id}}" role="tab" data-toggle="tab">
                    Education
                </a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active firstItem" id="portfolio{{$freelancer->id}}">
                <div class="row" style="padding-top: 17px;padding-bottom: 16px;background: #fdfdfd;">
                    <div class="col-md-12">
                        <div id="freelancer_works">
                            <projects-list></projects-list>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="work{{$freelancer->id}}">
                <div class="panelFormLabel" style="padding-top: 17px; padding-bottom: 17px;">
                    <div class="col-md-12">
                        <div  id="work_overview">
                            <works-list></works-list>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="education{{$freelancer->id}}">
                <div class="row" style="padding-top: 17px;padding-bottom: 16px;background: #fdfdfd;">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12" style="padding: 0!important;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="education" class="panelFormLabel">Title<span id="tickMarkeduTitle1" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
                                        <input type="text" class="form-control" name="eduTitle1" value="{{$eduTitle1}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="education" class="panelFormLabel">Year<span id="tickMarkeduYear1" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
                                        <input type="text" name="eduYear1" value="{{$eduYear1}}" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="education" class="panelFormLabel">Description <span id="tickMarkeduDesc1" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
                                        <textarea class="form-control" rows="4" id="education" name="eduDesc1">{{$eduDesc1}}
                            </textarea><br/>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="col-md-12" style="padding: 0!important;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="education" class="panelFormLabel">Title<span id="tickMarkeduTitle2" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
                                        <input type="text" class="form-control" name="eduTitle2" value="{{$eduTitle2}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="education" class="panelFormLabel">Year<span id="tickMarkeduYear2" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
                                        <input type="text" name="eduYear2" value="{{$eduYear2}}" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="education" class="panelFormLabel">Description <span id="tickMarkeduDesc2" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
                                        <textarea class="form-control" rows="4" id="education" name="eduDesc2">{{$eduDesc2}}
                                 </textarea><br/>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="col-md-12" style="padding: 0!important;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="education" class="panelFormLabel">Title<span id="tickMarkeduTitle3" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
                                        <input type="text" class="form-control" name="eduTitle3" value="{{$eduTitle3}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="education" class="panelFormLabel">Year<span id="tickMarkeduYear3" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
                                        <input type="text" name="eduYear3" value="{{$eduYear3}}" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="education" class="panelFormLabel">Description <span id="tickMarkeduDesc3" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
                                        <textarea class="form-control" rows="4" id="education" name="eduDesc3">{{$eduDesc3}}
                                </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    <div id="imageUploadSave" class="d-none" style="color:lightseagreen; padding: 10px;">
        Please save your changes before leaving.
    </div>
</div>


{{-- modals : modal of import behance --}}

<!-- Modal -->
<div class="modal fade" id="behanceDataModal" tabindex="-1" role="dialog" aria-labelledby="behanceDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="border: none;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeBehanceModal" style="outline: none;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalBody">
                <form method="post" action="" id="behanceDataForm">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="userName" class="panelFormLabel">Your Behance profile link :</label>
                        <input type="text" class="form-control panelFormInput" id="behanceLink" name="behanceLink"  value="" required>
                        <p id="behanceLinkError" class="d-none" style="color: red;">Link is not correct.</p>
                        <p id="behanceLinkWait" class="d-none" style="color: gray;">
                            Please wait, importing your data from Behance..
                        </p>
                    </div>

                    <div class="modal-footer" style="border: none;">
                        <div class="buttonMain col-md-3 offset-md-9" style="margin-top: 0;">
                            <button type="submit" class="btn-block hireBtn" id="importBtn">Import</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>