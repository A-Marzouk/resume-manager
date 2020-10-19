<?php $__env->startSection('content'); ?>
    <div class="greeting" >Hello!</div>
    <hr>
    <div class="mailText">
        We have a new business support application,<br/>
        Name : <b><?php echo e($firstName); ?> <?php echo e($lastName); ?></b><br/>
    </div>
    <div class="buttonMain col-md-4 offset-4">
        <a href="<?php echo e($recordLink); ?>" class="hireBtn btn-block" target="_blank">
            Listen to record
        </a>
    </div>

    <div class="buttonMain col-md-4 offset-4">
        <a href="123workforce.magictimeapps.com/admin/<?php echo e($id); ?>" class="hireBtn btn-block" target="_blank">
            View profile
        </a>
    </div>

    <div class="buttonMain col-md-4 offset-4">
        <a href="<?php echo e($cv_src); ?>" class="hireBtn btn-block" target="_blank">
            Uploaded cv
        </a>
    </div>

    <br/>
    <div class="mailText">
        <br/><br/>
        Kindest Regards,<br/><b>123 Workforce</b>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.email', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>