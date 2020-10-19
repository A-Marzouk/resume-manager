<?php $__env->startSection('content'); ?>
    <div id="freelancerResumeShortV2" class="d-flex justify-content-center">
        <freelancer-resume-short-v2 :freelancer="<?php echo e($freelancer); ?>"></freelancer-resume-short-v2>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.client-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>