<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.includes.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div id="client_services">
                    <services-list :client_id = <?php echo e($client->id); ?>></services-list>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>