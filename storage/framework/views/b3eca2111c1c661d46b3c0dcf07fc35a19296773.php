<div role="tabpanel" class="tab-pane" id="bookings">
    <br/>
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
        <? foreach ($bookings as $booking):?>
        <tr id="selectedRowBooking<?php echo e($booking->id); ?>">
                <?php if(App\Client::where('id',$booking->client_id)->first() != null ): ?>
            <th scope="row">
                <?
                $clientName = 'Visitor' ;
                if($booking->client_id){
                    $clientName = App\Client::where('id',$booking->client_id)->first()->name ;
                }
                    $freelancer     = App\User::where('id',$booking->user_id)->first();

                    if(!$freelancer){
                        continue;
                    }
                ?>
                <label class="form-check-label col-md-3 checkBoxContainer checkBoxText">
                    <input  style="<?php if($errors->has('availableHours')): ?> border:1px solid red; <?php endif; ?>" class="form-check-input" id="selectedBooking<?php echo e($booking->id); ?>" type="checkbox" name="selectedBookings[]" value="<?php echo e($booking->id); ?>">
                    <span class="checkmark"></span>
                </label>
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
            <td scope="row"><?php echo e($freelancer->firstName); ?> <?php echo e($freelancer->lastName); ?></td>
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
                <?php endif; ?>
        </tr>

        <? endforeach;?>
        </tbody>
    </table>
</div>