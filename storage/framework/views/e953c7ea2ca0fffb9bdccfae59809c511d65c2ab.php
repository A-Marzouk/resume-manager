<?php $__env->startSection('content'); ?>
    <div id="send_invitations_vue">
        <send-invitations :job="<?php echo e($job); ?>"></send-invitations>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>