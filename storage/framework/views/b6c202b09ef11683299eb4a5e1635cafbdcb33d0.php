<div class="ImportDataBtn">

    <?
    $clientID = '865ff2s2qvpkzb' ;
    $redirectURL = 'https://123workforce.com/freelancer/linkedin';

    $instagramClientID = "f877808c985d4f43ad73ae517db95151";
    $instagramRedirectURL = 'https://123workforce.com/freelancer/instagram';

    ?>

    <? if($profession == 'Designer'):?>
        <a class="btn btn-outline-dark" href="javascript:void(0)" id="importBehanceData" data-toggle="modal" data-target="#behanceDataModal">
            Import data from Behance
        </a>

        <? if(session()->get('admin') && session()->get('admin') == 'AdminWasHere'):?>
            <a class="btn btn-outline-dark"  href="https://api.instagram.com/oauth/authorize/?client_id=<?php echo e($instagramClientID); ?>&redirect_uri=<?php echo e($instagramRedirectURL); ?>&response_type=code" id="importBehanceData">
                Import data from Instagram
            </a>
        <? endif;?>

    <? else:?>
        <a class="btn btn-outline-dark"  href="https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=<?php echo e($clientID); ?>&redirect_uri=<?php echo e($redirectURL); ?>&state=987654321&scope=r_basicprofile" id="importBehanceData">
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
                    <img src="/images/Shape.png" width="15px;" height="12px;">
                </span>
            </label>
            <input type="text" style="<?php if($errors->has('name')): ?> border:1px solid red; <?php endif; ?>" class="form-control panelFormInput" id="fullName" name="name" placeholder="Enter your name.." value="<?if(empty($name)):?><?php echo e($currFreelancer->firstName); ?> <?php echo e($currFreelancer->lastName); ?><?else:?><?php echo e($name); ?><? endif;?>">
        </div> <!-- Full name -->
        <div class="form-group col-md-6 col-lg-4">
            <label for="birth_date" class="panelFormLabel">Job title <span style="font-size:small;">*</span> <span id="tickMarkjobTitle" class="d-none"><img src="/images/Shape.png" width="15px;" height="12px;"></span></label>
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
            <select class="custom-select" style="<?php if($errors->has('jobTitle')): ?> border:1px solid red; <?php endif; ?> padding-top: 12px !important; padding-bottom: 12px !important; height: auto!important;" id="jobTitle" name="jobTitle">
                <? if($profession == 'Developer'):?>
                <option value="" selected disabled>-- Developer --</option>
                <? foreach($developer as $job):?>
                <option value="<?php echo e($job); ?>" <?if($jobTitle == $job):?>selected<?endif;?> ><?php echo e($job); ?></option>
                <? endforeach;?>
                <?else:?>
                <option value="" disabled selected>-- Designer --</option>
                <? foreach($designer as $job):?>
                <option value="<?php echo e($job); ?>"<?if($jobTitle == $job):?>selected<?endif;?>><?php echo e($job); ?></option>
                <? endforeach;?>
                <? endif;?>
            </select>
        </div> <!-- job title -->

        <div class="form-group col-md-6 col-lg-4">
            <label for="country"  class="panelFormLabel">Country where you live & work <span style="font-size:small;">*</span><span id="tickMarkcountry" class="d-none"><img src="/images/Shape.png" width="15px;" height="12px;"></span></label>
            <input type="text" style="<?php if($errors->has('country')): ?> border:1px solid red; <?php endif; ?>" class="form-control panelFormInput" name="country" value="<?php echo e($country); ?>" id="country">
        </div> <!-- country -->

        <div class="form-group col-md-6 col-lg-4">
            <label for="birth_date"  class="panelFormLabel">City<span style="font-size:small;">*</span><span id="tickMarkcity" class="d-none"><img src="/images/Shape.png" width="15px;" height="12px;"></span></label>
            <input type="text" style="<?php if($errors->has('city')): ?> border:1px solid red; <?php endif; ?>" class="form-control panelFormInput" name="city" value="<?php echo e($city); ?>" id="city">
        </div> <!-- city -->

        <div class="form-group col-md-6 col-lg-4">
            <label for="languages"  class="panelFormLabel">Languages you speak <span style="font-size:small;">*</span> <span id="tickMarklanguages" class="d-none"><img src="/images/Shape.png" width="15px;" height="12px;"></span></label>
            <input type="text" style="<?php if($errors->has('languages')): ?> border:1px solid red; <?php endif; ?>" class="form-control panelFormInput" id="languages" name="languages" value="<?php echo e($languages); ?>">
        </div> <!-- Languages -->


    </div>
    <hr>
    <div class="row">
        <div class="form-group col-md-6 col-lg-4">
            <label for="birth_date" class="panelFormLabel">Primary contact Email <span style="font-size:small;">*</span><span id="tickMarkemail" class="d-none"><img src="/images/Shape.png" width="15px;" height="12px;"></span></label>
            <input type="email" style="<?php if($errors->has('email')): ?> border:1px solid red; <?php endif; ?>" class="form-control panelFormInput" name="email" value="<?if(empty($email)):?><?php echo e($currFreelancer->email); ?><?else:?><?php echo e($email); ?><? endif;?>">
        </div> <!-- email -->

        <div class="form-group col-md-6 col-lg-4">
            <label for="skype_id"  class="panelFormLabel">Skype ID  <span style="font-size:small;">*</span><span id="tickMarkskype_id" class="d-none"><img src="/images/Shape.png" width="15px;" height="12px;"></span></label>
            <input type="text"  style="<?php if($errors->has('skype_id')): ?> border:1px solid red; <?php endif; ?>" class="form-control panelFormInput" name="skype_id" value="<?php echo e($skype_id); ?>" id="skype_id">
        </div> <!-- skype_id -->

        <div class="form-group col-md-6 col-lg-4">
            <label for="telephone"  class="panelFormLabel">Phone number <span style="font-size:small;">*</span><span id="tickMarktelephone" class="d-none"><img src="/images/Shape.png" width="15px;" height="12px;"></span></label>
            <input type="text"  style="<?php if($errors->has('telephone')): ?> border:1px solid red; <?php endif; ?>" class="form-control panelFormInput" name="telephone" value="<?php echo e($telephone); ?>" id="telephone">
        </div> <!-- telephone -->

        <div class="form-group col-lg-6 col-md-6">
            <? $socialApps = ['Whatsapp','Viber','Telegram'] ;
            $social_appsCheckBoxes = explode(',',$social_apps);
            ?>
            <label class="panelFormLabel">Social applications<span id="tickMarksocial_apps" class="d-none"><img src="/images/Shape.png" width="15px;" height="12px;"></span></label>
            <div class="form-check" style="padding-top: 15px;">
                <?php $__currentLoopData = $socialApps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label class="form-check-label col-md-3 checkBoxContainer checkBoxText"><?php echo e($app); ?>

                        <input  style="<?php if($errors->has('availableHours')): ?> border:1px solid red; <?php endif; ?>" class="form-check-input" type="checkbox" name="social_apps[]" value="<?php echo e($app); ?>"
                                <? if(in_array($app,$social_appsCheckBoxes)): ?> checked <?endif;?> >
                        <span class="checkmark"></span>
                    </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>  <!-- social apps availabel -->
    </div>

    <hr>
    <div class="row">
        <div class="form-group col-md-12">
            <label for="intro"  class="panelFormLabel">Intro <span id="tickMarkintro" class="d-none"><img src="/images/Shape.png" width="15px;" height="12px;"></span></label>
            <textarea class="form-control" rows="3" name="intro" id="intro"><?php echo e($intro); ?></textarea>
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
            <span id="tickMarkphoto" class="d-none"><img src="/images/Shape.png" width="15px;" height="12px;">
            </span>
            <div class="input-group" style="opacity: 0; height: 3px;">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="photo" id="photoInput">
                    <label class="custom-file-label" for="">Choose photo</label>
                </div>
            </div>
            <? $src = '/images/add_profile_photo.png';
            if(!empty($photoPath)){
                $src = $photoPath;
            }
            ?>
            <div class="col-md-4">
                <div  id="profileImgBox">
                    <img id="photoPreview" src="<?php echo e($src); ?>" style="">
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
