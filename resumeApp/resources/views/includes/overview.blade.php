<div class="ImportDataBtn">

    <?
    $clientID = '865ff2s2qvpkzb' ;
    $redirectURL = 'https://123workforce.com/freelancer/linkedin';

    ?>

    <? if($profession == 'Designer'):?>
        <a class="btn btn-outline-dark" href="javascript:void(0)" id="importBehanceData" data-toggle="modal" data-target="#behanceDataModal">
            Import data from Behance
        </a>
    <? else:?>
        <a class="btn btn-outline-dark"  href="https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id={{$clientID}}&redirect_uri={{$redirectURL}}&state=987654321&scope=r_basicprofile" id="importBehanceData">
            Import basic info from Linkedin
        </a>
    <? endif;?>

</div>

<div role="tabpanel" class="panel tab-pane active" id="overview">
    <div class="d-none d-md-block panelHeading">
        <ul>
            <li>
                Basic Information
            </li>
        </ul>
    </div>
    <div class="d-xs-block d-sm-block d-md-none panelHeading">
            Basic Information
    </div>
    <div class="row">
        <div class="form-group col-md-6 col-lg-4">
            <label for="userName" class="panelFormLabel">Full name <span style="font-size:small;">*</span>
                <span id="tickMarkname" class="d-none">
                    <img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;">
                </span>
            </label>
            <input type="text" style="@if($errors->has('name')) border:1px solid red; @endif" class="form-control panelFormInput" id="fullName" name="name" placeholder="Enter your name.." value="<?if(empty($name)):?>{{$currFreelancer->firstName}} {{$currFreelancer->lastName}}<?else:?>{{$name}}<? endif;?>">
        </div> <!-- Full name -->
        <div class="form-group col-md-6 col-lg-4">
            <label for="birth_date" class="panelFormLabel">Job title <span style="font-size:small;">*</span> <span id="tickMarkjobTitle" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
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
            <select class="custom-select" style="@if($errors->has('jobTitle')) border:1px solid red; @endif padding-top: 12px !important; padding-bottom: 12px !important; height: auto!important;" id="jobTitle" name="jobTitle">
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
        </div> <!-- job title -->
        <div class="form-group col-md-6 col-lg-4">
            <label for="birth_date" class="panelFormLabel">Primary contact Email <span style="font-size:small;">*</span><span id="tickMarkemail" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
            <input type="email" style="@if($errors->has('email')) border:1px solid red; @endif" class="form-control panelFormInput" name="email" value="<?if(empty($email)):?>{{$currFreelancer->email}}<?else:?>{{$email}}<? endif;?>">
        </div> <!-- email -->
        <div class="form-group col-md-6 col-lg-4">
            <label for="birth_date"  class="panelFormLabel">City where you live & work <span style="font-size:small;">*</span><span id="tickMarkcity" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
            <input type="text" style="@if($errors->has('city')) border:1px solid red; @endif" class="form-control panelFormInput" name="city" value="{{$city}}" id="city">
        </div> <!-- city -->
        <div class="form-group col-md-6 col-lg-4">
            <label for="languages"  class="panelFormLabel">Languages you speak <span style="font-size:small;">*</span> <span id="tickMarklanguages" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
            <input type="text" class="form-control panelFormInput" id="languages" name="languages" value="{{$languages}}" required>
            <small>Separated by commas</small>
        </div> <!-- Languages -->
    </div>
    <hr>
    <div class="row">
        <div class="form-group col-md-12">
            <label for="intro"  class="panelFormLabel">Intro <span id="tickMarkintro" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
            <textarea class="form-control" rows="3" name="intro" id="intro">{{$intro}}</textarea>
            <small>30-50 Words</small>
        </div> <!-- intro -->
    </div>
    <hr>
    <div class="d-none d-md-block panelHeading">
        <ul>
            <li>
                Profile photo
            </li>
        </ul>
    </div>
    <div class="d-xs-block d-sm-block d-md-none panelHeading">
        Profile photo
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <span class="panelFormLabel col-md-4">Choose photo (1024 wide x 1024 height) <span style="font-size:small;">*</span></span>
            <span id="tickMarkphoto" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;">
            </span>
            <div class="input-group" style="opacity: 0; height: 3px;">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="photo" id="photoInput">
                    <label class="custom-file-label" for="">Choose photo</label>
                </div>
            </div>
            <? $src = 'resumeApp/resources/views/customTheme/images/add_profile_photo.png';
            if(!empty($photoPath)){
                $src = $photoPath;
            }
            ?>
            <div class="col-md-4">
                <div  id="profileImgBox">
                    <img id="photoPreview" src="{{$src}}" style="">
                </div>
            </div>
        </div>
    </div> <!-- profile photo -->
    <div class="row">
        <div class="buttonMain col-md-3 offset-md-9">
            <a class="btn-block hireBtn nextBtn"  href="#pay">Next</a>
        </div>
    </div>
</div>
