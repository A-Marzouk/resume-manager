<?php $__env->startSection('content'); ?>
        <?
            $freelancer = $user1;
            if(!isset($value['id'])){
                $value['id'] = '';
            }
        ?>

        <div class="container">
            <? $profit = 5 ;?>
                <div class="marginMobile-0">
                    <div class="freelancerCard" style="margin-bottom: -3px;">
                        <div class="row actionRow">
                            <div class="importBtn importBtn_upload NoDecor">
                                <a href="javascript:void(0)" id="<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>_open_references" style="outline: none;" class="openReferences">
                                    References / Testimonials
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php echo $__env->make('freelancer_card', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.client-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>