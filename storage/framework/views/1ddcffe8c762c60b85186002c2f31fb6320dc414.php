<?

    use App\User;
    use App\UserData;

    extract($data);

?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php echo $__env->make('admin.includes.leftBar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="col-md-10">


            <div class="tab-content" style="min-height: 400px; overflow-x: auto;">
                <?php echo $__env->make('admin.includes.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php echo $__env->make('admin.includes.searches', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



                <?php echo $__env->make('admin.includes.freelancers', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php if(in_array('Subscriptions',$permissions)): ?>
                    <?php echo $__env->make('admin.includes.subscriptions', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>

                <?php if(in_array('Clients and invoices',$permissions)): ?>
                    <?php echo $__env->make('admin.includes.clients', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>

                <?php if(in_array('Freelancers',$permissions)): ?>
                    <?php echo $__env->make('admin.includes.searches', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
                <?php if(in_array('Freelancers',$permissions)): ?>
                    <?php echo $__env->make('admin.includes.bookings', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php endif; ?>

                <?php if(in_array('Freelancers',$permissions)): ?>
                    <?php echo $__env->make('admin.includes.owners', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>

                <?php if(in_array('Jobs',$permissions)): ?>
                    <?php echo $__env->make('admin.includes.jobs_posts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>


            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>