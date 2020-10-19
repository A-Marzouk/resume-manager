
<div class="row nameRow">


    <div class="col-lg-2 col-6 imageCol">
        <div class="imageContainer" style="padding: 10px;">
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
    <div class="col-lg-3 col-md-4 col-6 freelancerCardLeft">
        <div class="nameArea">
            <div class="nameCard">
                <?php echo e($freelancer->firstName); ?>

            </div>
            <div class="jobTitle" style="color: white; font-size: 14px; padding-top: 7px;" id="animatedText<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>">
                <?php echo e($freelancer->userData->jobTitle); ?>

            </div>

            <?php if(!$smallCard): ?>
            <form action="/chat-room/start_conversation" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="freelancer_id" value="<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>">
                <input type="submit"  value="TAP TO CHAT" class="tap-to-chat cursorPointerOnHover" style="background: none; border:none; outline: none;">
            </form>
            <?php endif; ?>

            <div id="welcomeText<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>" class="d-none">
                Hi, I am <?php echo e($freelancer->firstName); ?>, I am a <?php echo e($freelancer->userData->jobTitle); ?>, How can I help
                you ?
            </div>
        </div>
    </div>


    <div class="col-lg-7 col-md-8 freelancerCardRight d-flex align-items-center">
        <?php if(!$smallCard): ?>
            <div class="row hireRow w-100">
                <div  class="col-md-4 text-center" style="font-size: 15px; color: white;" >
                    <span style="font-weight: bold;">
                        <?
                            if(isset($profit)){
                                $salary = intval($freelancer->userData->salary) + $profit ;
                            }else{
                                $salary = intval($freelancer->userData->salary);
                            }
                        ?>
                        $<?php echo e($salary); ?>

                    </span>
                    <div class="cardLabel" style="font-size: 13px; font-weight: normal;">Hourly rate</div>
                </div>
                <div class="col-md-4 text-center"  style="font-size: 15px; color: white;">
                    <span id="maxHours<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>" style="font-weight: bold;"><?php echo e(intval($freelancer->userData->availableHours)); ?> hours</span>
                    <div class="cardLabel" style="font-size: 13px; font-weight: normal;">Weekly Availability</div>
                </div>

                <div class="col-md-4" style="padding: 0;">
                    <?php if($freelancer->userData->availableHours !=0): ?>
                        <div class="row text-center cardRow NoDecor">
                            <?php if(isset($portfolioModal) && !$isClient): ?>
                                <a class="hireCardBtn btn-block showHireSection" href="<?php echo e(route('client.login')); ?>">
                                    Hire me
                                </a>
                            <?php else: ?>
                                <a class="hireCardBtn btn-block showHireSection" href="javascript:void(0)" id="showHireSection<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>">
                                    Hire me
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
        </div>
        <?php endif; ?>
    </div>
</div>