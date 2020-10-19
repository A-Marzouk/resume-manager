<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin.includes.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Client email</th>
            <th scope="col">Amount paid</th>
            <th scope="col">Hours / weeks</th>
            <th scope="col">Booked Freelancer</th>
            <th scope="col">Status</th>
            <th scope="col">Date</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">
                    <?
                    $clientName = 'Visitor' ;
                    $freelancerName = 'Not assigned' ;
                    if($booking->client_id){
                        $clientName = App\Client::where('id',$booking->client_id)->first()->name ;
                    }
                    if($booking->user_id){
                        $freelancer     = App\User::where('id',$booking->user_id)->first();
                        $freelancerName = $freelancer->firstName .' '. $freelancer->lastName ;
                    }
                    ?>
                </th>
                <td scope="row"><?php echo e($clientName); ?></td>
                <td scope="row">
                    <?php if($booking->payment_method == 'PayPal'): ?>
                        <?php echo e($booking->amount_paid); ?> USD
                    <?php else: ?>
                        <?php echo e($booking->amount_paid/100); ?> USD
                    <?php endif; ?>
                </td>
                <td scope="row"><?php echo e($booking->hours); ?> / <?php echo e($booking->weeks); ?></td>
                <td scope="row"><?php echo e($freelancerName); ?></td>
                <td scope="row">
                    <?php if($booking->canceled): ?>
                        <span class="panelFormLabel">Finished</span>
                    <?php else: ?>
                        <span class="panelFormLabel" style="color: lightgreen;">On going</span>
                    <?php endif; ?>
                    <div>
                        <?php if($booking->payment_method == 'PayPal'): ?>
                            <?php if($booking->is_paid): ?> Paid <?php else: ?> Unpaid <?php endif; ?>
                        <?php else: ?>
                            Paid
                        <?php endif; ?>
                    </div>
                </td>
                <td scope="row">
                    <?php echo e($booking->created_at->format('M d, Y')); ?>

                </td>
        </tr>
        </tbody>
    </table>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>