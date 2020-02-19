{{-- photo and name + multimedia--}}
<div class="freelancerCard m-0 freelancerCard_updated">
    <div class="resumeCardRight">
        <div class="row nameRow">
            <form method="post"
                  action="{{route('freelancer.data.store')}}"
                  enctype="multipart/form-data"
                  class="container freelancerForm formDisplay"
            >
                <span id="user_id" class="d-none">{{$freelancer->id}}</span>
                {{csrf_field()}}

                <div class="col-lg-2 col-6 imageCol">
                    <div class="imageContainer" style="padding: 10px;">
                        <?
                        $defaultSrc = '/images/add_profile_photo.png';

                        $photoSrc = $freelancer->userData->profile_picture;
                        if (!empty($photoSrc)) {
                            if ($photoSrc[0] !== '/' && $photoSrc[0] !== 'h') {
                                $photoSrc = '/' . $photoSrc;
                            }
                        } else {
                            $photoSrc = $defaultSrc;
                        }
                        ?>
                        <img src="{{$photoSrc}}" alt="freelancer" class="freelancerImg"
                             width="108" height="108" id="photoPreview_card">
                        <div class="row NoDecor">
                            <a class="addImageContainer" href="javascript:void(0)" id="addPhoto_card">
                                <img src="/images/add_photo.png" alt="add photo">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12 freelancerCardLeft freelancerCardLeft_edit_card mobile-auto-margin">
                    <div class="nameArea nameArea_edit_Card">
                        <div class="nameCard">
                            <input type="text" class="form-control cardInput"
                                   id="fullName" name="name"
                                   placeholder="Enter your name.."
                                   value="<?if(empty($name)):?>{{$freelancer->firstName}} {{$freelancer->lastName}}<?else:?>{{$name}}<? endif;?>"
                            >
                        </div>
                        <div class="jobTitle jobTitle_edit_card"
                             style="color: white; font-size: 14px; padding-top: 7px;">
                            <?
                            $developer = [
                                'Full-Stack Developer', 'Front-End Developer', 'PHP Developer',
                                'Javascript Developer', '.NET Developer',
                                'iOS Developer', 'Android Developer', 'Swift Developer',
                                'Java Developer', 'Data Scientist', 'C C++ Developer', 'Team Leader',
                                'Unity Developer', 'Ruby Developer', 'Python Developer', 'SQL Developer', 'Wordpress Developer'
                            ];
                            $designer = ['UI/UX Designer', 'UI Designer', ' UX Designer',
                                'Illustrator', 'Motion Graphics', 'Art Director', 'Branding',
                                'Graphic Designer', ' Web Designer', 'Game Designer', 'Digital Artist'];

                            $businessSupport = ['Business Support'];
                            ?>

                            <select class="custom-select cardSelect"
                                    style="
                                        background-color: rgba(67,103,211,0.5);
                                        background:rgba(67,103,211,0.5) url('/images/white_arrow.png')  no-repeat right .75rem center;
                                        background-size: 19px 11px;
                                        border-radius: 5px;
                                        height: 38px;
                                        border: 1px solid #FFFFFF;
                                        color: #FDFDFD;
                                        font-family: Roboto;
                                        font-size: 13px;
                                        font-weight: bold;
                                        letter-spacing: 0.09px;
                                        line-height: 15px;"
                                    id="jobTitle" name="jobTitle">
                                <? if($profession_id == 2):?>
                                <option value="" selected disabled>-- Developer --</option>
                                <? foreach($developer as $job):?>
                                <option value="{{$job}}" <?if($freelancer->userData->job_title == $job):?>selected<?endif;?> >{{$job}}</option>
                                <? endforeach;?>
                                <?elseif($profession_id == 3):?>
                                <option value="" disabled selected>-- Designer --</option>
                                <? foreach($designer as $job):?>
                                <option value="{{$job}}" <?if($freelancer->userData->job_title == $job):?>selected<?endif;?>>{{$job}}</option>
                                <? endforeach;?>
                                <?else:?>
                                <option value="" disabled selected>-- Bussiness support --</option>
                                <? foreach($businessSupport as $job):?>
                                <option value="{{$job}}" <?if($freelancer->userData->job_title == $job):?>selected<?endif;?>>{{$job}}</option>
                                <? endforeach;?>
                                <? endif;?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-8 col-12 freelancerCardRight">
                    <div class="row interviewIcons">
                        <div class="col-md-4 jobTitle text-right d-none d-md-inline"
                             style="font-size:12px;color: white; padding-top: 13px; padding-right: 30px;">
                            Your interviews :
                        </div>
                        <div class="col-12 col-lg-4 audioTransArea text-center NoDecor">
                            <a href="javascript:void(0)" style="outline: none;" id="browseBtn">
                                <div class="cardIconsCon  cardIconsCon_edit">
                                    <span>
                                <img src="/images/audio_resume_Card.png"
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
                                <div class="cardIconsCon2 cardIconsCon2_edit text-center">
                            <span>
                                <img src="/images/video_resume_card.png"
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
                                    <div class="col-md-2 col-2" style="padding: 9px 0 0 0;">
                                        <a href="javascript:void(0)" id="dollarsMinus{{$freelancer->id}}"
                                           class="dollarsMinus">
                                            <img src="/images/newResume/minus copy 6.png"
                                                 style="width: 18px; padding-right: 8px;" alt="minus">
                                        </a>
                                    </div>

                                    <div class="col-md-8 col-8 textBox">
                                        <span id="numberOfDollars{{$freelancer->id}}">{{ (int) $freelancer->agent->hourly_rate}}</span>
                                        $<br/>
                                        <span style="font-size: 13px; font-weight: normal">Hourly Rate</span>
                                    </div>

                                    <div class="col-md-2 col-2" style="padding: 9px 0 0 0;">
                                        <a href="javascript:void(0)" id="dollarsPlus{{$freelancer->id}}"
                                           class="dollarsPlus">
                                            <img src="/images/newResume/plus copy 6.png"
                                                 style="width: 18px; padding-left: 8px;" alt="plus">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center hireRow calculateBox" style="margin-left: 7px;">
                            <div class="hoursBtn NoDecor" style="color:white; background: none; border:none;">
                                <div class="row">
                                    <div class="col-md-2 col-2" style="padding: 9px 0 0 0;">
                                        <a href="javascript:void(0)" id="hoursMinus{{$freelancer->id}}"
                                           class="hoursMinus">
                                            <img src="/images/newResume/minus copy 6.png"
                                                 style="width: 18px; padding-right: 8px;" alt="minus">
                                        </a>
                                    </div>
                                    <div class="col-md-8 col-8 textBox">
                                        <span id="numberOfHours{{$freelancer->id}}">@if($freelancer->userData->available_hours_per_week==0)
                                                0 @else {{(int) $freelancer->userData->available_hours_per_week}} @endif</span>
                                        hours<br/>
                                        <span id="maxHours{{$freelancer->id}}" class="d-none">60</span>
                                        <span style="font-size: 13px; font-weight: normal">Weekly Availability</span>
                                    </div>
                                    <div class="col-md-2 col-2" style="padding: 9px 0 0 0;">
                                        <a href="javascript:void(0)" id="hoursPlus{{$freelancer->id}}"
                                           class="hoursPlus">
                                            <img src="/images/newResume/plus copy 6.png"
                                                 style="width: 18px; padding-left: 8px;" alt="plus">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="file" id="audioFile" name="audioFile"
                       style="width: 1px; height: 1px; opacity: 0; right:145%;">
                <input type="file" id="video_file" name="video_file"
                       style="width: 1px; height: 1px; opacity: 0; right:145%;">
                <input type="file" id="photoInput" name="photo"
                       style="width: 1px; height: 1px; opacity: 0; right:145%;">
                <input type="text" id="salary{{$freelancer->id}}" name="salary"
                       style="width: 1px; height: 1px; opacity: 0; right:145%;" value="<? if (!empty($salary)) {
                    echo $salary;
                } else {
                    echo '';
                }?>">
                <input type="text" id="availableHours{{$freelancer->id}}" name="availableHours"
                       style="width: 1px; height: 1px; opacity: 0; right:145%;" value="<? if (!empty($available_hours_per_week)) {
                    echo $available_hours_per_week;
                } else {
                    echo '';
                }?>">
            </form>
        </div>
    </div>

    <div id="nav-taps-resume-card">
        <ul class="nav nav-tabs navRow" role="tablist">

            <li class="offset-md-2 nav-item col-md-2 col-4 NoDecor">
                <a class="nav-link navTab text-center active" href="#skills{{$freelancer->id}}" role="tab" data-toggle="tab">
                    Skills
                </a>
            </li>


            @if($freelancer->profession == 'businessSupport')
                <li class="col-md-2 col-4 nav-item NoDecor">
                    <a class="nav-link navTab text-center " href="#recordings{{$freelancer->id}}" role="tab"
                       data-toggle="tab">
                        Recordings
                    </a>
                </li>
            @else
                <li class="col-md-2 col-4 nav-item NoDecor">
                    <a class="nav-link navTab text-center " href="#portfolio{{$freelancer->id}}" role="tab"
                       data-toggle="tab">
                        Projects
                    </a>
                </li>
            @endif


            <li class="nav-item col-md-2 col-4 NoDecor">
                <a class="nav-link navTab text-center" href="#work{{$freelancer->id}}" role="tab" data-toggle="tab">
                    Work
                </a>
            </li>
            <li class="nav-item col-md-2 col-4 NoDecor d-none">
                <a class="nav-link navTab text-center" id="showReferences{{$freelancer->id}}"
                   href="#references{{$freelancer->id}}" role="tab" data-toggle="tab">
                </a>
            </li>

            <li class="nav-item col-md-2 col-4 NoDecor">
                <a class="nav-link navTab text-center" href="#education{{$freelancer->id}}" role="tab"
                   data-toggle="tab">
                    Education
                </a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active firstItem" id="skills{{$freelancer->id}}">
                <div class="row" style="padding-bottom: 16px;background: #fdfdfd;">
                    <div class="col-md-12">


                        {{-- Skills area --}}
                        <div id="freelancer_skills">
                            <skills-list :user_id="{{$freelancer->id}}"></skills-list>
                        </div>


                    </div>
                </div>
            </div>


            @if($freelancer->profession == 'businessSupport')
                <div role="tabpanel" class="tab-pane  firstItem" id="recordings{{$freelancer->id}}">
                    <div class="row" style="padding-top: 17px;padding-bottom: 16px;background: #fdfdfd;">
                        <div class="col-md-12">
                            <div id="freelancer_works">
                                <records-list></records-list>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div role="tabpanel" class="tab-pane firstItem" id="portfolio{{$freelancer->id}}">
                    <div class="row" style="padding-top:17px; padding-bottom: 16px;background: #fdfdfd;">
                        <div class="col-md-12">


                            <div id="freelancer_works">
                                <projects-list :user_id="{{$freelancer->id}}"></projects-list>
                            </div>


                        </div>
                    </div>
                </div>

            @endif

            <div role="tabpanel" class="tab-pane fade" id="work{{$freelancer->id}}">
                <div style="padding-top: 17px; padding-bottom: 17px;">
                    <div class="col-md-12">
                        <div id="work_overview">
                            <works-list  :user_id="{{$freelancer->id}}"></works-list>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="education{{$freelancer->id}}">
                <div class="" style="padding-top: 17px; padding-bottom: 17px;">
                    <div class="col-md-12">
                        <div id="freelancer_educations">
                            <educations-list  :user_id="{{$freelancer->id}}"></educations-list>
                        </div>
                    </div>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane fade" id="references{{$freelancer->id}}">
                <div class="" style="padding-top: 17px; padding-bottom: 17px;">
                    <div class="col-md-12">
                        <div id="freelancer_references">
                            <references-list  :user_id="{{$freelancer->id}}"></references-list>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- modals : modal of import behance --}}

<!-- Modal -->
<div class="modal fade" id="behanceDataModal" tabindex="-1" role="dialog" aria-labelledby="behanceDataModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="border: none;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeBehanceModal"
                        style="outline: none;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalBody">
                <form method="post" action="" id="behanceDataForm">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="userName" class="panelFormLabel">Your Behance profile link :</label>
                        <input type="text" class="form-control panelFormInput" id="behanceLink" name="behanceLink"
                               value="" required>
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
