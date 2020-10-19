<?php $__env->startSection('content'); ?>
    <div class="greeting" >Hello Admin !</div>
    <hr>
    <div class="mailText">
        We have a new freelancer on board :<br/>
        Name : <b><?php echo e($firstName); ?> <?php echo e($lastName); ?></b><br/>
        Profession : <?php echo e($profession); ?>

    </div>
    <div class="buttonMain col-md-4 offset-md-4" style="text-align: center;">
        <a href="123workforce.magictimeapps.com/<?php echo e($username); ?>" class="hireBtn btn-block" target="_blank">
            View Resume
        </a>
    </div>
    <br/>
    <div class="mailText">
        Kindest Regards,<br/><b>123 Workforce</b>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.email', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>