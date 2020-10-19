<?php $__env->startSection('content'); ?>
        <?
            $freelancer = $user1;
            if(!isset($value['id'])){
                $value['id'] = '';
            }
        ?>

        <div class="container">
            <? $profit = 5 ;?>
            <?php echo $__env->make('freelancer_card', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.client-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>