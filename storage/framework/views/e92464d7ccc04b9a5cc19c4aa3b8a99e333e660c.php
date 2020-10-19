<div class="row cardMainInfo_mob">
    <div class="col-6">
        <div class="imageContainer" style="padding: 20px 10px 10px 10px;">
            <?
            $photoSrc = $freelancer->userData->photo;
            if(!empty($photoSrc)){
                if ($photoSrc[0] !== '/' && $photoSrc[0] !== 'h') {
                    $photoSrc = '/' . $photoSrc;
                }
            }else{
                $photoSrc = '/images/user.png';
            }
            ?>
            <img src="<?php echo e($photoSrc); ?>" alt="freelancer" class="freelancerImg"
                 width="120" height="120">
        </div>
    </div>
    <div class="col-6 resumeCardRight">
        <div class="nameArea">
            <div class="nameCard">
                <?php echo e($freelancer->firstName); ?>

            </div>
            <div class="jobTitle" style="font-size: 17px; padding-left: 0; color: #c1d1ff" id="animatedText<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>">
                <?php echo e($freelancer->userData->jobTitle); ?>

            </div>
            <div  class="text-left" style="font-size: 15px; color: white; padding-top: 5px;" >
                <div class="cardLabel" style="font-weight: 300; font-size:14px ;">Hourly rate :
                    <span style="font-weight: bold;">
                        $<?php echo e(intval($freelancer->userData->salary)); ?>

                    </span>
                </div>
            </div>
            <div class="text-left"  style="font-size: 15px; color: white; padding-top: 5px;">
                <div class="cardLabel" style="font-weight: 300; font-size:14px ;">Availability :  <span id="maxHours<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>" style="font-weight: bold;"><?php echo e(intval($freelancer->userData->availableHours)); ?>h/week</span></div>
            </div>
            <div id="welcomeText<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>" class="d-none">
                Hi, I am <?php echo e($freelancer->firstName); ?>, I am a <?php echo e($freelancer->userData->jobTitle); ?>, How can I help
                you ?
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6" style="margin-top: -39px; padding-left: 28px;">
            <form action="/chat-room/start_conversation" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="freelancer_id" value="<?php echo e($freelancer->id); ?>">
                <input type="submit"  value="TAP TO CHAT" class="tap-to-chat cursorPointerOnHover" style="background: none; border:none; outline: none;">
            </form>
        </div>
    </div>

    <div class="col-12" style="padding: 10px 20px 16px 20px;">
        <?php if($freelancer->userData->availableHours !=0): ?>
            <div class="text-center cardRow NoDecor">
            <?php if(isset($portfolioModal) && !$isClient): ?>
                <a class="hireCardBtn btn-block showHireSection" href="<?php echo e(route('client.login')); ?>">
                    Hire me
                </a>
            <?php else: ?>
                <a class="hireCardBtn btn-block showHireSection_mob" href="javascript:void(0)" id="showHireSection_mob<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>">
                    Hire me
                </a>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</div>


<div class="row interviewIcons" style="padding:10px 0 0 0;">
    <div class="col-12 jobTitle text-center" style="color:#4E75E8; padding-top: 0; padding-bottom: 15px; padding-left: 0;">
        View interviews
    </div>
</div>

<div class="row" style="padding-bottom: 15px;">
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