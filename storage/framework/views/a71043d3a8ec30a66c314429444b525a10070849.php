<?php $__env->startSection('content'); ?>
    <div class="container" id="clientJobs">
        <jobs-list></jobs-list>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.client-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>