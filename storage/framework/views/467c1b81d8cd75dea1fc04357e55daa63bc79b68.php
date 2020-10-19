<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="col-md-6 offset-md-3">
        <?php echo $__env->make('auth.login_tabs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>