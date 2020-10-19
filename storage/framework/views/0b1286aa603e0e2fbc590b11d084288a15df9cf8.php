<?php $__env->startSection('content'); ?>

    <!-- Success Messages  -->
    <?php if(session()->has('successMessage')): ?>
        <div style="padding-top: 20px;">
            <div class="alert alert-success" id="successMessage">
                <?php echo e(session()->get('successMessage')); ?>

            </div>
        </div>
    <?php endif; ?>


    <div id="searchFreelancers">
        <search-freelancers></search-freelancers>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>