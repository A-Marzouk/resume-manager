<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12" id="agents">
                <agents-list></agents-list>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>