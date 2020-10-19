<? $showVideo = false;
if(!isset($value['id'])){
    $value['id'] = '';
}

$smallCard = false ;
?>

<div class="freelancerCard" id="card<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>">

    <div class="row">

        <div class="col-lg-12 col-md-12 col-12 resumeCardRight" id="resumeCardRight<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>">
            <div class="showOnlyOnmd">
                <?php echo $__env->make('sample_card_includes.main_card_info_sample', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>

            <div class="showOnlyOnsm">
                <?php echo $__env->make('sample_card_includes.main_card_info_mob_sample', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>

            <div id="portfolioFull<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>">
                <?php echo $__env->make('sample_card_includes.navRow_sample', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                <span class="aboutText">EDUCATION</span>
                <div class="aboutText">
                    <? if(!empty($freelancer->userData->eduTitle1)):?>
                    <div class="row">
                        <div class="col-md-12 aboutSubText">
                            <div class="year"><span
                                        class="circle"></span> <?php echo e($freelancer->userData->eduYear1); ?></div>
                            <div class="title"><?php echo e($freelancer->userData->eduTitle1); ?></div>
                            <div class="desc"><?php echo e($freelancer->userData->eduDesc1); ?></div>
                        </div>
                    </div>
                    <br/>
                    <? endif; ?>
                    <? if(!empty($freelancer->userData->eduTitle2)):?>
                    <div class="row">
                        <div class="col-md-10 aboutSubText">
                            <div class="year"><span
                                        class="circle"></span> <?php echo e($freelancer->userData->eduYear2); ?></div>
                            <div class="title"><?php echo e($freelancer->userData->eduTitle2); ?></div>
                            <div class="desc"><?php echo e($freelancer->userData->eduDesc2); ?></div>
                        </div>
                    </div>
                    <br/>
                    <? endif; ?>
                    <? if(!empty($freelancer->userData->eduTitle3)):?>
                    <div class="row">
                        <div class="col-md-10 aboutSubText">
                            <div class="year"><span
                                        class="circle"></span> <?php echo e($freelancer->userData->eduYear3); ?></div>
                            <div class="title"><?php echo e($freelancer->userData->eduTitle3); ?></div>
                            <div class="desc"><?php echo e($freelancer->userData->eduDesc3); ?></div>
                        </div>
                    </div>
                    <? endif; ?>
                </div>
            </div>
            <div class="col-12 paddingTop_mob" style="padding-top: 15px;">
                <span class="aboutText">TRAININGS</span>
                <div class="aboutText">
                    <? if(!empty($freelancer->userData->trnTitle1)):?>
                    <div class="row">
                        <div class="col-md-12 aboutSubText">
                            <div class="year"><span
                                        class="circle"></span> <?php echo e($freelancer->userData->trnYear1); ?></div>
                            <div class="title"><?php echo e($freelancer->userData->trnTitle1); ?></div>
                            <div class="desc"><?php echo e($freelancer->userData->trnDesc1); ?></div>
                        </div>
                    </div>
                    <br/>
                    <? endif; ?>
                    <? if(!empty($freelancer->userData->trnTitle3)):?>
                    <div class="row">
                        <div class="col-md-10 aboutSubText">
                            <div class="year"><span
                                        class="circle"></span> <?php echo e($freelancer->userData->trnYear2); ?></div>
                            <div class="title"><?php echo e($freelancer->userData->trnTitle2); ?></div>
                            <div class="desc"><?php echo e($freelancer->userData->trnDesc2); ?></div>
                        </div>
                    </div>
                    <br/>
                    <? endif; ?>
                    <? if(!empty($freelancer->userData->trnTitle3)):?>
                    <div class="row">
                        <div class="col-md-10 aboutSubText">
                            <div class="year"><span
                                        class="circle"></span> <?php echo e($freelancer->userData->trnYear3); ?></div>
                            <div class="title"><?php echo e($freelancer->userData->trnTitle3); ?></div>
                            <div class="desc"><?php echo e($freelancer->userData->trnDesc3); ?></div>
                        </div>
                    </div>
                    <? endif; ?>
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

<div id="skillsContent<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>" class="d-none">
    <?php echo $__env->make('freelancer_card_includes.skills', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>

<div id="interviewsContent<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>" class="d-none">
    <div class="row" style="padding-bottom: 15px; padding-top: 30px;">
        <div class="col-6">
            <div class="audioTransArea text-center NoDecor">
                <a href="javascript:void(0)" id="<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>_open_audio" style="outline: none;" class="openAudio">
                    <div class="cardIconsCon ">
                    <span>
                        <img src="/images/audio_blue.png"
                             alt="" style="padding-right: 5px; width: 23px;">
                        <span class="audioText"  style="color: #4E75E8;">Audio & Text</span>
                    </span>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-6">
            <div class="videoArea NoDecor">
                <a href="javascript:void(0)" id="<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>_open_video" style="outline: none;" class="openVideo">
                    <div class="cardIconsCon2  text-center">
            <span>
                <img src="/images/video_blue.png"
                     alt="" style="padding-right: 5px; width: 23px;">
                <span class="audioText"  style="color: #4E75E8;">Video</span>
            </span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>




<div id="defaultContent<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>" class="d-none">
    <div class="showOnlyOnmd">
        <?php echo $__env->make('sample_card_includes.main_card_info_sample', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

    <div class="showOnlyOnsm">
        <?php echo $__env->make('sample_card_includes.main_card_info_mob_sample', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

    <div id="portfolioFull<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>">
        <?php echo $__env->make('sample_card_includes.navRow_sample', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('freelancer_card_includes.portfolio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <div class="d-none" id="hireSection<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>">
        <?php echo $__env->make('freelancer_card_includes.hireSection', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>


</div>
