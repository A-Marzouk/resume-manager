<?php $__env->startSection('content'); ?>
    <div class="greeting">Hello!</div>
    <hr>
    <div class="mailText">
        A new form submission from 123Workforce temp form, <br><br/>
        Name : <?php echo e($fullName); ?><br/>
        Address : <?php echo e($address); ?><br/>
        Date of Birth : <?php echo e($date); ?><br/>
        Email : <?php echo e($email); ?><br/>
        Mobile : <?php echo e($mobile); ?><br/>
        Relationship Status : <?php echo e($relationStatus); ?><br/>
        Age of Children : <?php echo e($ageOfChild); ?><br/>
        Notes : <?php echo e($notes); ?><br/>
        Do you have a spare room? : <?php echo e(isset($submitNote1) ? 'YES' : 'NO'); ?><br/>
        Please note that we can't accept applications from those that have children that are younger than school going age.. Please tick to confirm that your own children are all of school going age or older or If you don't have any children of your own please also tick this box
        : <?php echo e(isset($submitNote2) ? 'YES' : 'NO'); ?><br/>

    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.email', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>