<?php $__env->startSection('content'); ?>
    <div id="newChat">
        <div class="">
            <new-chat client_id="<?php if($currClient): ?><?php echo e($currClient->id); ?><?php endif; ?>" user_id="<?php if($currUser): ?><?php echo e($currUser->id); ?><?php endif; ?>"></new-chat>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.client-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>