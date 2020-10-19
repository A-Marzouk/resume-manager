<div id="freelancers">
    <div class="row customContainer">
        <div class="col-md-8 offset-md-1 offset-lg-0">
            <div class="secondSectionHeading">
                Hire<br/><span>Great Developers.</span>
                <div class="lineDivider"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <section class="freelancers">
                <div class="slickSlide">
                    <?php $__currentLoopData = $homeFreelancers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $freelancer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-12 freelancerBox">
                        <a <? if(!$isClient): ?> href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalCenter" <? else:?> href="/client" <? endif;?> class="itemLink">
                            <div class="freelancerItem">
                                <img src="<?php echo e($freelancer->userData->photo); ?>"
                                     alt="freelancer" class="slickFreelancerImg" style="filter: grayscale(100%);">
                                <div class="freelancerData">
                                    <div class="freelancerName nohover">
                                        <?php echo e($freelancer->firstName); ?> <?php echo e($freelancer->lastName); ?>

                                    </div>
                                    <div class="freelancerJob">
                                        <?php echo e($freelancer->userData->jobTitle); ?>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            </section>
        </div>
    </div>

  
</div>