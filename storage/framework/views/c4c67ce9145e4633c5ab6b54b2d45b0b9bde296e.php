<?php $__env->startSection('content'); ?>
    <!-- Success Messages  -->
    <div style="padding-top: 20px;">
        <?php if(session()->has('successMessage')): ?>
            <div class="alert alert-success" id="successMessage">
                <?php echo e(session()->get('successMessage')); ?>

            </div>
        <?php endif; ?>
    </div>

    <div id="send_emails_vue">
        <send-emails></send-emails>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>