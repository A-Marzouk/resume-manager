<?
extract($data);
$currFreelancer = auth()->user();
?>
<?php $__env->startSection('content'); ?>
    <? if(session()->get('admin') && session()->get('admin') == 'AdminWasHere'):?>
    <div class="row container">
        <div class="col-3 alert-success alert"  style="margin-left: 15px;">
            Viewing as admin
        </div>
    </div>

    <div class="row container">
        <div class="col-6">
            <div class="form-group">
                <label class="panelFormLabel">Assigned owner</label>
                <select class="custom-select" style="<?php if($errors->has('jobTitle')): ?> border:1px solid red; <?php endif; ?> padding-top: 12px !important; padding-bottom: 12px !important; height: auto!important;" id="ownerEmail" name="ownerEmail">
                    <option value="" disabled selected>-- Owner's Email --</option>
                    <? foreach($affiliates as $affiliate):?>
                    <option value="<?php echo e($affiliate->id); ?>"<?if($currFreelancer->affiliate['email'] == $affiliate->email):?>selected<?endif;?>><?php echo e($affiliate->email); ?></option>
                    <? endforeach;?>
                </select>
                <a href="javascript:void(0)" id="saveOwner" class="btn btn-outline-primary d-none" style="margin-top: 6px;">Save</a>
            </div> <!-- owner assignment -->
        </div>
    </div>
    <? endif;?>
    <div class="row container">
        <? if(session()->get('admin') && session()->get('admin') == 'AdminWasHere'):?>
        <div class="col-md-2">
            <a target="_blank" class="btn btn-outline-primary" href="<?php echo e($username); ?>">Link to resume </a>
        </div>
        <div class="col-md-2">
            <a href="<?php echo e(route('freelancer.dashboard')); ?>" class="btn btn-outline-primary">Show new form</a>
        </div>
        <? endif; ?>
    </div>
    <hr>

    <div class="container">
        <div class="row tabsArea fixed-top d-sm-block d-xs-block d-md-block d-lg-none" id="tabsMobile" style="margin-top: 50px;   background: linear-gradient(0deg, #FFFFFF 0%, #FCFCFC 100%);">
            <div class="col-md-12 text-center formTaps">
                <ul class="nav nav-tabs" id="mytabs" role="tablist">
                    <li class="nav-item" id="tap1phone">
                        <a class="nav-link active text-center tabText" href="#overview" role="tab" data-toggle="tab">
                            <div class="col-md-6 offset-md-4 tabCircle">1</div>
                            Overview and
                            Personal info
                        </a>
                    </li>
                    <li class="nav-item" id="tap2">
                        <a class="nav-link text-center tabText" href="#pay" role="tab" data-toggle="tab">
                            <div class="col-md-6 offset-md-4 tabCircle">2</div>
                            Availability and
                            Pay
                        </a>
                    </li>
                    <li class="nav-item" id="tap3">
                        <a class="nav-link text-center tabText" href="#multimedia" role="tab" data-toggle="tab">
                            <div class="col-md-6 offset-md-4 tabCircle">3</div>
                            Multimedia
                            (Audio/Video)
                        </a>
                    </li>
                    <li class="nav-item" id="tap4phone">
                        <a class="nav-link text-center tabText" href="#career" role="tab" data-toggle="tab">
                            <div class="col-md-6 offset-md-4 tabCircle">4</div>
                            Career overview
                            (Edu/Training)
                        </a>
                    </li>
                    <li class="nav-item" id="tap5">
                        <a class="nav-link text-center tabText" href="#portfolio" role="tab" data-toggle="tab">
                            <div class="col-md-6 offset-md-4 tabCircle">5</div>
                            Portfolio / Previous work
                        </a>
                    </li>
                    <li class="nav-item" id="tap6">
                        <a class="nav-link text-center tabText" href="#skills" role="tab" data-toggle="tab">
                            <div class="col-md-6 offset-md-4 tabCircle">6</div>
                            Professional skills
                        </a>
                    </li>
                    <li class="nav-item" id="tap7phone">
                        <a class="nav-link text-center tabText" href="#attributes" role="tab" data-toggle="tab">
                            <div class="col-md-6 offset-md-4 tabCircle">7</div>
                            Personal attributes
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="text-center">
            <div class="pageHeading" id="tabMainHeading">1.Overview and personal info</div>
            <div class="pageSubHeading">
                It is important to keep your available hours that you can work updated.
            </div>
            <div class="pageSubHeading2 col-md-8 offset-md-2">
                Once your page here is completed & approved, our team will start to promote your Resume to companies seeking to hire.
                Once selected, you will then be asked for Skype interviews.
            </div>
        </div>
        
        <div class="row tabsArea d-none d-lg-block">
            <div class="col-md-12 text-center formTaps">
                <ul class="nav nav-tabs" id="mytabs" role="tablist">
                    <li class="nav-item" id="tap1">
                        <a class="nav-link active text-center tabText" href="#overview" role="tab" data-toggle="tab">
                            <div class="col-md-6 offset-md-4 tabCircle">1</div>
                            Overview and
                            Personal info
                        </a>
                    </li>
                    <li class="nav-item" id="tap2phone">
                        <a class="nav-link text-center tabText" href="#pay" role="tab" data-toggle="tab">
                            <div class="col-md-6 offset-md-4 tabCircle">2</div>
                            Availability and
                            Pay
                        </a>
                    </li>
                    <li class="nav-item" id="tap3phone">
                        <a class="nav-link text-center tabText" href="#multimedia" role="tab" data-toggle="tab">
                            <div class="col-md-6 offset-md-4 tabCircle">3</div>
                            Multimedia
                            (Audio/Video)
                        </a>
                    </li>
                    <li class="nav-item" id="tap4">
                        <a class="nav-link text-center tabText" href="#career" role="tab" data-toggle="tab">
                            <div class="col-md-6 offset-md-4 tabCircle">4</div>
                            Career overview
                            (Edu/Training)
                        </a>
                    </li>
                    <li class="nav-item" id="tap5phone">
                        <a class="nav-link text-center tabText" href="#portfolio" role="tab" data-toggle="tab">
                            <div class="col-md-6 offset-md-4 tabCircle">5</div>
                            Portfolio / Previous work
                        </a>
                    </li>
                    <li class="nav-item" id="tap6phone">
                        <a class="nav-link text-center tabText" href="#skills" role="tab" data-toggle="tab">
                            <div class="col-md-6 offset-md-4 tabCircle">6</div>
                            Professional skills
                        </a>
                    </li>
                    <li class="nav-item" id="tap7">
                        <a class="nav-link text-center tabText" href="#attributes" role="tab" data-toggle="tab">
                            <div class="col-md-6 offset-md-4 tabCircle">7</div>
                            Personal attributes
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Success Messages  -->
        <div style="padding-top: 20px;">
            <?php if(session()->has('successMessage')): ?>
                <div class="alert alert-success" id="successMessage">
                    <?php echo e(session()->get('successMessage')); ?>

                </div>
            <?php endif; ?>
        </div>

        
        <?php if(session()->has('errorMessage')): ?>
            <div class="alert alert-danger" style="margin-top: 30px;">
                <?php echo e(session()->get('errorMessage')); ?>

            </div>
        <?php endif; ?>
    <!-- Display Errors  -->
        <?
        $requiredFields = [
            '1. Overview and personal info'=>[
                'link'=>'overview',
                'name', 'city','jobTitle','email','languages','intro','photo','skype_id','telephone','social_apps'
            ],
            '2. Availability and pay' => [
                'link'=>'pay',
                'salary','availableHours','freeDate','availableHours','currency','timeZone','salary_month',
            ],
            '3. Multimedia' => [
                'link'=>'multimedia',
                'audio','audioFile','video','video_file'
            ],
            '4. Career overview' => [
                'link'=>'career','eduTitle1','eduTitle2','eduTitle3','eduYear1','eduYear2','eduYear3',
                'eduDesc1','eduDesc2','eduDesc3','trnTitle1','trnTitle2','trnTitle3','careerObjective',
                'trnYear1','trnYear2','trnYear3','trnDesc1','trnDesc2','trnDesc3'
            ],
            '5. Portfolio' => [
                'link'=>'portfolio',
                'githubLink','stackoverflowLink','behanceLink','instagramLink','dribbleLink',
                'personalSite'
            ],
            '6. Professional skills'=>['link'=>'skills','primarySkills',
                'design_skills_checkbox','primarySkills','design_styles'
            ],
            '7. Personal attributes' => [
                'link'=>'attributes',
                'personal_interests','professional_attributes','charSkills'
            ]
        ];


        $errorTab = '';
        ?>
        <div style="padding-top: 20px;">
            <? if(count($errors->getMessages()) > 0):?>
            <? foreach($errors->getMessages() as $key => $error):?>
            <div class="form-group col-md-8">
                <div class="alert alert-danger" style="font-size: small;">
                    <?
                    foreach ($requiredFields as $tab => $errorFields){
                        if(in_array($key,$errorFields)){
                            $errorTab = $tab;
                        }
                    }

                    ?>
                    <? if(isset($error[0]) && isset($errorTab) && isset($requiredFields[$errorTab]['link'])):?>
                    <?php echo e($error[0]); ?> <a class="nextBtn" href="#<?php echo e($requiredFields[$errorTab]['link']); ?>">(<?php echo e($errorTab); ?>)</a>

                    <? else:?>
                    Something went wrong.
                    <? endif;?>
                </div>
            </div>
            <? endforeach;?>
            <? endif; ?>
        </div>

        <form method="post" action="<?php echo e(route('freelancer.data.store')); ?>" enctype="multipart/form-data" class="container freelancerForm">
        <?php echo e(csrf_field()); ?>

        <!-- Tab panes -->
            <div class="tab-content" id="tabsContent">
                <?php echo $__env->make('includes.overview', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('includes.pay', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('includes.multimedia', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('includes.career', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('includes.portfolio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('includes.skills', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('includes.attributes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <br/>
        </form>
    </div>
    

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
                        <?php echo e(csrf_field()); ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>