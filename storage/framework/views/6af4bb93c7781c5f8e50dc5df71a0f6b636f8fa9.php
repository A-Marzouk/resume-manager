<?php $__env->startSection('content'); ?>
    <div class="greeting" >Hello !</div>

    <div class="mailText">
        We have some new jobs that might interest you.
    </div>
    <div class="buttonMain col-md-4 offset-4" style="padding-top: 15px;">
        <a href="<?php echo e($jobPostLink); ?>" class="hireBtn btn-block" target="_blank">
            View & Apply
        </a>
    </div>
    <br/>
    <br/>
    <br/>

    <div class="mailText">
        Kindest Regards,<br/><b>123 Workforce</b>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.email', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>