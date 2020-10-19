<?php $__env->startSection('content'); ?>

    <?
    $isClient = true;
    if(auth()->guard('client')->guest()){
        $isClient = false;
    }
    ?>
    <div id="content" style="margin:auto;">

        <?php echo $__env->make('homepage_sections.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('homepage_sections.freelancers', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="line"></div>

        <?php echo $__env->make('homepage_sections.talent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('homepage_sections.dev_boxes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('homepage_sections.our_clients', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.client-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>