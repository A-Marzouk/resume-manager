<? $showVideo = true;
   if(!isset($value['id'])){
       $value['id'] = '';
   }

   $smallCard = false ;
   if(!isset($freelancer->id)){
       return;
   }
?>
<div class="freelancerCard" id="card<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>">

    <div class="row">

        <div class="col-lg-12 col-md-12 col-12 resumeCardRight" id="resumeCardRight<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>">
            <div class="showOnlyOnmd">
                <?php echo $__env->make('custom_resume.main_card_info_custom', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>

            <div class="showOnlyOnsm">
                <?php echo $__env->make('custom_resume.main_card_info_mob_custom', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>

            <div id="portfolioFull<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>">
                <?php echo $__env->make('freelancer_card_includes.portfolio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="d-none" id="hireSection<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>">
                <?php echo $__env->make('freelancer_card_includes.hireSection', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>

        </div>

    </div>

</div>


    
    <div class="row resumeExpand d-none" id="area_viewEducationBtn<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>">
        <div id="educationContent<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>" class="education about addScroll">
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
                                    <?php echo e($education->school_title); ?>

                                </div>
                                <div class="year"><span class="work">
                                                <?php echo e(date('F Y', strtotime($education->date_from))); ?>

                                        <? if($education->currently_learning):?>
                                        - Present
                                        <? else: ?>
                                        - <?php echo e(date('F Y', strtotime($education->date_to))); ?>

                                        <? endif;?>
                                            </span>
                                </div>
                                <div class="desc"><?php echo e($education->description); ?></div>
                            </div>
                        </div>
                        <? endforeach;?>
                    </div>
                </div>
            </div>
        </div>
        <hr style="width: 85%">
        
        <div id="workContent<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>" class="education about">
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
                                    <?php echo e($work->job_title); ?>

                                </div>
                                <div class="company"><?php echo e($work->company); ?></div>
                                <div class="year"><span class="work">
                                                <?php echo e(date('F Y', strtotime($work->date_from))); ?>

                                        <? if($work->currently_working):?>
                                        - Present
                                        <? else: ?>
                                        - <?php echo e(date('F Y', strtotime($work->date_to))); ?>

                                        <? endif;?>
                                            </span>
                                </div>
                                <div class="desc"><?php echo e($work->job_description); ?></div>
                            </div>
                        </div>
                        <? endforeach;?>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <br>

    

    <div id="audioContent<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>" class="d-none">
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
                    <img src="/images/audio_blue.png"
                         alt="" style="padding-right: 14px; width: 34px;">
                    <span class="audioText" style="color: #4E75E8;">Audio & Text Interview</span>
                </span>
            </div>
            <div class="col-lg-1 col-1 text-center NoDecor" style="padding: 24px 0 0 0;">
                <a href="javascript:void(0)" class="audioText audioDismiss" style="color: #4E75E8; font-size: large;" id="audio_dismiss<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>"> x </a>
            </div>
        </div>
        <div class="row card-audio-con">
            <div class="col-md-10 offset-md-1 text-center">
                <audio controls style="width: 100%">
                    <source src="<?php echo e($audioSrc); ?>" type="audio/ogg">
                    Your browser does not support the audio element.
                </audio>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="transcript">
                        <?php if(!empty($freelancer->userData->audio_transcript)): ?>
                            <?php echo e($freelancer->userData->audio_transcript); ?>

                        <?php else: ?>
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
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <div id="videoContent<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>" class="d-none">
        <div class="row" style="border-bottom: 1px solid whitesmoke; padding-bottom: 25px;">
            <div class="col-lg-11 col-11 text-left" style="padding: 25px 0 0 20px;">
                 <span>
                    <img src="/images/video_blue.png"
                         alt="" style="padding-right: 14px; width: 34px;">
                    <span class="audioText" style="color: #4E75E8;">Video Interview</span>
                </span>
            </div>
            <div class="col-lg-1 col-1 text-center NoDecor" style="padding: 24px 0 0 0;">
                <a href="javascript:void(0)" class="audioText audioDismiss" style="color: #4E75E8; font-size: large;" id="audio_dismiss<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>"> x </a>
            </div>
        </div>
        <div class="row">
            <?php if($showVideo): ?>
                <?php if($freelancer->userData->video_file !== null): ?>
                    <div class="row card-audio-con" style="background-color: white;">
                        <div class="col-md-12">
                            <div class="text-center">
                                <video width="100%" id="videoResume" height="auto" controls>
                                    <source src="/<?php echo e($freelancer->userData->video_file); ?>">
                                </video>
                            </div>
                        </div>
                    </div>
                <?php elseif($freelancer->userData->video !== null): ?>
                    <div class="row card-audio-con" style="background-color: white;">
                        <div class="col-md-12">
                            <div class="text-center">
                                <iframe src="/<?php echo e($freelancer->userData->video); ?>" frameborder="1"
                                        allow="encrypted-media" allowfullscreen width="100%" height="auto">

                                </iframe>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="transcript">
                            Video is coming soon..
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>


    
    <div id="referencesContent<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>" class="d-none">
        <div class="row" style="border-bottom: 1px solid whitesmoke; padding-bottom: 25px;">
                <div class="col-lg-11 col-11 text-left" style="padding: 25px 0 0 20px;">
                 <span>
                     <img src="/images/comment-512.png"
                          alt="" style="padding-right: 14px; width: 34px;">
                    <span class="audioText" style="color: #4E75E8;">  References & Testimonials</span>
                </span>
                </div>
                <div class="col-lg-1 col-1 text-center NoDecor" style="padding: 24px 0 0 0;">
                    <a href="javascript:void(0)" class="audioText audioDismiss" style="color: #4E75E8; font-size: large;" id="audio_dismiss<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>"> x </a>
                </div>
</div>
        <div style="padding-bottom: 35px;">
            <?php $__currentLoopData = $freelancer->references; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reference): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row">
                    <div class="col-md-12 aboutSubText">
                        <div class="title work">
                            <span class="circle"></span>
                            <?php echo e($reference->title); ?>

                        </div>
                        <div class="year">
                        <span class="work">
                            <?php echo e($reference->company); ?>

                        </span>
                        </div>
                        <div class="year">
                        <span class="work">
                            <?php echo e($reference->email); ?>

                        </span>
                        </div>
                        <div class="year">
                        <span class="work">
                            <?php echo e($reference->phone); ?>

                        </span>
                        </div>
                        <div class="desc"><?php echo e($reference->details); ?></div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    

    <div id="defaultContent<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>" class="d-none">
        <div class="showOnlyOnmd">
            <?php echo $__env->make('freelancer_card_includes.main_card_info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

        <div class="showOnlyOnsm">
            <?php echo $__env->make('freelancer_card_includes.main_card_info_mob', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

        <?php echo $__env->make('freelancer_card_includes.skills', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div id="portfolioFull<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>">
            <?php echo $__env->make('freelancer_card_includes.navRow', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('freelancer_card_includes.portfolio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="d-none" id="hireSection<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>">
            <?php echo $__env->make('freelancer_card_includes.hireSection', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

    </div>
