<?php $__env->startSection('content'); ?>
    <div class="greeting" >Hello Admin, a freelancer has been booked</div>
    <hr>
    <div class="mailText">
        Client : <b><?php echo e($clientName); ?></b><br/><br/>
        Client mail : <b><?php echo e($email); ?></b><br/><br/>
        Freelancer: <b><?php echo e($freelancerName); ?></b><br/>
    </div>
    <br/>
    <div class="mailText">
        Kindest Regards,<br/><b>123 Workforce</b>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.email', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>