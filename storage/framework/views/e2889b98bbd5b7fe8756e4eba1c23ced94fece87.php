<?php $__env->startSection('content'); ?>

    <div id="adminDashboard">
        <admin-dashboard <?php if(isset($users)): ?> :users="<?php echo e($users); ?>" <?php endif; ?>></admin-dashboard>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>