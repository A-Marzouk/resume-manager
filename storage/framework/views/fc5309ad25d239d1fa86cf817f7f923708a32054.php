<?php $__env->startSection('content'); ?>
    <?
        $freelancer = $user1;
    ?>
    
    <?php echo $__env->make('sample_freelancer_card', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.client-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>