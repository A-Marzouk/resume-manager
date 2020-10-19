<div class="row cardMainInfo_mob">
    <div class="col-4">
        <div class="imageContainer" style="padding: 20px 10px 10px 10px;">
            <?
            $photoSrc = $freelancer->userData->photo;
            if(!empty($photoSrc)){
                if ($photoSrc[0] !== '/' && $photoSrc[0] !== 'h') {
                    $photoSrc = '/' . $photoSrc;
                }
            }
            ?>
            <img src="<?php echo e($photoSrc); ?>" alt="freelancer" class="freelancerImg"
                 width="90" height="90">
        </div>
    </div>
    <div class="col-5 resumeCardRight">
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
                        $<?php echo e(intval($freelancer->userData->salary) +5); ?>

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
    <div class="col-3" style="padding-top: 45px;">
        <div class="text-center cardRow NoDecor">
            <a class="hireCardBtn btn-block showHireSection_mob" href="javascript:void(0)" id="showHireSection_mob<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>">
                Hire me
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-6" style="margin-top: -34px; padding-left: 35px;">
            <form action="/chat-room/start_conversation" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="freelancer_id" value="<?php echo e($freelancer->id); ?>">
                <input type="submit"  value="CHAT" class="tap-to-chat cursorPointerOnHover" style="background: none; border:none; outline: none;">
            </form>
        </div>
    </div>

</div>


