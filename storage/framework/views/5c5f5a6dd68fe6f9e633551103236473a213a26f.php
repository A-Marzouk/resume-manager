<?php $__env->startSection('content'); ?>

    <!-- Success Messages  -->
    <div style="padding-top: 20px;">
        <?php if(session()->has('successMessage')): ?>
            <div class="alert alert-success" id="successMessage">
                <?php echo e(session()->get('successMessage')); ?>

            </div>
        <?php endif; ?>
    </div>

    <div class="container">
        <?php if(count($freelancers) >= 1): ?>
            <div style="text-align: left; padding-bottom: 25px;">
                <div class="pageHeading">
                    List of freelancers
                </div>
                <div class="pageSubHeading">
                    <?php echo e($search_name); ?>

                </div>
            </div>
            <?php $__currentLoopData = $freelancers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $freelancer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($freelancer->userData->short_resume == 0): ?>
                    <?php echo $__env->make('freelancer_card', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php else: ?>
                    <?php echo $__env->make('custom_resume.freelancer_card_custom', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <div style="text-align: left; padding-bottom: 25px;">
                <div class="pageHeading">
                    Sorry, this search is empty
                </div>
                <div class="pageSubHeading" style="padding-bottom: 140px">
                    Please make sure you have the right link.
                </div>
            </div>
        <?php endif; ?>
    </div>
    <script>
        let stripe_buttons = document.getElementsByClassName("stripe-button-el");
        for (let i = 0; i < stripe_buttons.length; ++i) {
            let item = stripe_buttons[i];
            item.style.display = 'none';
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.client-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>