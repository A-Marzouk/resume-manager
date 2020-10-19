<?php $__env->startSection('content'); ?>
    <div class="greeting" >Hello!</div>
    <hr>
    <div class="mailText">
        You have been confirmed to work for <?php echo e($clientName); ?> <br/>

        On these dates and times. <br/>

        Date : <?php echo e($weekDate); ?><br/>
        Time : From: <?php echo e($start_time); ?>  To: <?php echo e($end_time); ?><br/>

        To view the campaign details please login to the campaign page via this link.


        <div class="buttonMain col-md-4 offset-4" style="margin-bottom: 20px;">
            <a href="123workforce.magictimeapps.com/workforce/campaign_briefs/<?php echo e($id); ?>" class="hireBtn btn-block" target="_blank">
                View campaign
            </a>
        </div>


    </div>
    <br/>
    <div class="mailText">
        Kindest Regards,<br/><b>123 Workforce</b>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.email', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>