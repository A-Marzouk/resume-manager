<div role="tabpanel" class="panel tab-pane active" id="overview">
    <div class="panelHeading">
        <ul>
            <li>
                Basic Information
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="userName" class="panelFormLabel">Full name<span id="tickMarkname" class="d-none">&#10003</span></label>
            <input type="text" class="form-control panelFormInput" id="fullName" name="name" placeholder="Enter your name.." value="<?if(empty($name)):?>{{$currFreelancer->firstName}} {{$currFreelancer->lastName}}<?else:?>{{$name}}<? endif;?>">
        </div> <!-- Full name -->
        <div class="form-group col-md-4">
            <label for="birth_date" class="panelFormLabel">Job title <span id="tickMarkjobTitle" class="d-none">&#10003</span></label>
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
            <select class="custom-select" style=" padding-top: 12px !important; padding-bottom: 12px !important; height: auto!important;" id="jobTitle" name="jobTitle">
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
        <div class="form-group col-md-4">
            <label for="birth_date" class="panelFormLabel">Primary contact Email<span id="tickMarkemail" class="d-none">&#10003</span></label>
            <input type="email" class="form-control panelFormInput" name="email" value="<?if(empty($email)):?>{{$currFreelancer->email}}<?else:?>{{$email}}<? endif;?>">
            <small>Gmail is preferred</small>
        </div> <!-- email -->
        <div class="form-group col-md-4">
            <label for="birth_date"  class="panelFormLabel">City where you live & work<span id="tickMarkcity" class="d-none">&#10003</span></label>
            <input type="text" class="form-control panelFormInput" name="city" value="{{$city}}">
        </div> <!-- city -->
        <div class="form-group col-md-4">
            <label for="languages"  class="panelFormLabel">Languages you speak at a high level<span id="tickMarklanguages" class="d-none">&#10003</span></label>
            <input type="text" class="form-control panelFormInput" id="languages" name="languages" value="{{$languages}}">
            <small>Separated by commas</small>
        </div> <!-- Languages -->
    </div><hr>
    <div class="row">
        <div class="form-group col-md-12">
            <label for="intro"  class="panelFormLabel">Intro <span id="tickMarkintro" class="d-none">&#10003</span></label>
            <textarea class="form-control panelFormInput" rows="3" name="intro">{{$intro}}</textarea>
            <small>30-50 Words</small>
        </div> <!-- intro -->
        <div class="form-group col-md-12">
            <div class="">
                <label style="border-bottom:1px lightgray solid ; padding: 2px;"  class="panelFormLabel">Photo of yourself <span id="tickMarkphoto" class="d-none">&#10003</span></label>
                <div class="input-group" style="padding-bottom: 10px;">
                    <div class="custom-file panelFormInput">
                        <input type="file" class="custom-file-input" name="photo" id="photoInput">
                        <label class="custom-file-label" for="">Choose photo</label>
                    </div>
                </div>
                <? $src = 'resumeApp/resources/views/customTheme/images/no-image-icon-.png';
                if(!empty($photoPath)){
                    $src = $photoPath;
                }
                ?>
                <img id="photoPreview" src="{{$src}}" width="200" height="auto">
            </div>
        </div> <!-- profile photo -->
    </div>
    <div class="row">
        <div class="col-md-3 offset-md-9">
            <a class="btn btn-block btn-primary nextBtn nextBtnStyle"  href="#pay">Next</a>
        </div>
    </div>
</div>
