<?php $__env->startSection('content'); ?>
    <div class="greeting" >Hello Admin !</div>
    <hr>
    <div class="mailText">
        We have a new message to sales :<br/><br/>
        Subject : <b><?php echo e($subject); ?></b><br/><br/>
        Message : <b><?php echo e($messageBody); ?></b><br/><br>
        From : <b><?php echo e($email); ?></b><br/>
    </div>
    <br/>
    <div class="mailText">
        Kindest Regards,<br/><b>123 Workforce</b>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.email', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>