<?php $__env->startSection('content'); ?>
    <div class="greeting">Hello Admin!</div>
    <hr>
    <div class="mailText">
        A new message sent to a designer,<br/><br/>
        To : <?php echo e($freelancer->firstName); ?> <?php echo e($freelancer->lastName); ?><br/>
        From : <?php echo e($sentMessage->name); ?>, <br/>
        <br/><br/>
        Sender Email : <?php echo e($sentMessage->email); ?> <br/>
        Message Body : <br/><?php echo e($sentMessage->body); ?> <br/>
    </div>
    <div class="buttonMain col-md-4 offset-md-4" style="text-align: center;">
        <a href="123workforce.magictimeapps.com/<?php echo e($freelancer->username); ?>"; class="hireBtn btn-block" target="_blank">View designer's resume</a>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.email', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>