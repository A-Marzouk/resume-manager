<?php $__env->startSection('content'); ?>
    <? if(session()->get('admin') && session()->get('admin') == 'AdminWasHere'):?>
    <div class="row container">
        <div class="col-md-3 alert-success alert"  style="margin-left: 15px;">
            Viewing as admin
        </div>
    </div>
    <hr>
    <? endif;?>
    <div class="container" id="affiliateDashboard">
        <div class="pageHeading">
             Personal info
        </div><br/>
        <div class="row">
            <div class="col-md-3 col-12 affiliatePhoto text-center">
                <div class="form-group">
                    <div class="input-group" style="opacity: 0; height: 3px;">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="affiliatePhoto" id="affiliatePhotoInput">
                        </div>
                    </div>
                    <? $src = '/images/user.png';
                    if(!empty($affiliate->photo)){
                        $src = $affiliate->photo;
                    }
                    ?>
                </div>
                <img id="affiliatePhotoPreview" src="<?php echo e($src); ?>" height="100px">
            </div>
            <div class="col-md-8 col-12 affiliateInfo">
                <div class="text-left pageSubHeading">

                </div>
                <div class="row">
                    <div class="col-3">
                        <span class="panelFormLabel">
                            Name :
                        </span>
                    </div>
                    <div class="col-9">
                        <?php echo e($affiliate->name); ?>

                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                         <span class="panelFormLabel">
                            Email :
                        </span>
                    </div>
                    <div class="col-9">
                        <?php echo e($affiliate->email); ?>

                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <span class="panelFormLabel">
                            Unique Code :
                        </span>
                    </div>
                    <div class="col-9">
                        <?php echo e($affiliate->code); ?>

                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <span class="panelFormLabel">
                            PayPal account :
                        </span>
                    </div>
                    <div class="col-9">
                        <?php echo e($affiliate->paypal_email); ?>

                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="pageSubHeading">
                    Invite new clients through this link.
                </div>
                <div class="col-12" style="padding-top: 15px;">
                    <span class="oneLineHiddenOverflow" id="uniqueLink_<?php echo e($affiliate->id); ?>">Https://123workforce.com/freelancer/workforce/register?ownerCode=<?php echo e($affiliate->code); ?></span>
                    <a href="javascript:void(0)" class="btn btn-outline-primary btn-sm copyLinkBtn" id="copyLinkBtn_<?php echo e($affiliate->id); ?>">Copy</a>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="pageSubHeading">
                    Invite new freelancer through this link.
                </div>
                <div class="col-12" style="padding-top: 15px;">
                    <span class="oneLineHiddenOverflow" id="uniqueClientLink_<?php echo e($affiliate->id); ?>">Https://123workforce.com/client/register?ownerCode=<?php echo e($affiliate->code); ?></span>
                    <a href="javascript:void(0)" class="btn btn-outline-primary btn-sm copyClientLinkBtn" id="copyClientLinkBtn_<?php echo e($affiliate->id); ?>">Copy</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="pageSubHeading">
                    Earnings according to owned clients' bookings
                </div>
                <div class="col-12" style="padding-top: 15px;">
                    <?
                    $totalBookings = 0 ;
                    $bookingsCount = 0 ;
                    foreach($affiliate->clients as $client){
                        foreach($client->bookings as $booking){
                            if(!$booking->canceled){
                                $totalBookings += $booking->amount_paid;
                                $bookingsCount++;
                            }
                        }
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-3">
                    <span class="panelFormLabel">
                        Total number of bookings :
                    </span>
                        </div>
                        <div class="col-md-9">
                            <strong><?php echo e($bookingsCount); ?> #</strong><br/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3">
                        <span class="panelFormLabel">
                            Total earnings :
                        </span>
                        </div>
                        <div class="col-9">
                            <strong><?php echo e($totalBookings/100); ?> $</strong><br/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                        <span class="panelFormLabel">
                            Total percent (5%) :
                        </span>
                        </div>
                        <div class="col-9">
                            <strong><?php echo e(($totalBookings/100) * (5/100)); ?> $</strong>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <? if(session()->get('admin') && session()->get('admin') == 'AdminWasHere'):?>
                        <br/>
                        <div style="border: 2px solid lightgray; border-radius: 10px;">
                            <span class="alert alert-success" style="margin-left: -2px;">Visible only to admin</span>
                            <form action="<?php echo e(route('submit.paypal.send.form')); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>


                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group" style="padding-top: 25px;">
                                            <input type="text" class="form-control" id="amount" placeholder="Amount to pay" name="amount" required>
                                        </div> <!-- amount to pay -->
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group col-md-6 offset-md-3">
                                            <input type="hidden" class="form-control panelFormInput" id="paypal_email" name="paypal_email" value="<?php echo e($affiliate->paypal_email); ?>">
                                        </div> <!-- paypal email -->

                                        <div class="buttonMain whiteBg" style="padding-top: 0">
                                            <button class="hireBtn btn-block hire" type="submit">Pay via Paypal</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <? endif; ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="pageSubHeading">
                    Payments' History
                </div>
                <br/>
                <div class="container text-left">
                    <?php $__currentLoopData = $affiliate->paymentHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pHistory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div style="display: list-item;">
                            Amount paid : <?php echo e($pHistory->amount_paid); ?> USD<br/>
                            Date : <?php echo e($pHistory->created_at->format('M d, Y')); ?><br/>
                        </div><br/>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="pageSubHeading">
                    Assigned clients : #<?php echo e(count($affiliate->clients)); ?>

                </div>
                <br/>
                <div class="container text-left">
                            <?php $__currentLoopData = $affiliate->clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p class="jobTitle">
                                <div  style="display: list-item;">
                                    <strong><?php echo e($client->name); ?></strong>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#clientDetails<?php echo e($client->id); ?>">
                                        Details
                                    </button><br/>
                                    <span class="panelFormLabel" style="padding-top: 8px;">
                                Registered at :
                            </span><?php echo e($client->created_at->format(('d M Y - H:i:s'))); ?>

                                <!-- Modal -->
                                    <div class="modal fade" id="clientDetails<?php echo e($client->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e($client->name); ?> - details</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6"> Name :</div>
                                                        <div class="col-md-6"> <?php echo e($client->name); ?></div>

                                                        <div class="col-md-6"> Email :</div>
                                                        <div class="col-md-6"> <?php echo e($client->email); ?></div>

                                                        <div class="col-md-6"> Agency :</div>
                                                        <div class="col-md-6"> <?php echo e($client->agency); ?></div>

                                                        <div class="col-md-6"> Email Dept :</div>
                                                        <div class="col-md-6"> <?php echo e($client->emailDept); ?></div>

                                                        <div class="col-md-6"> Time zone :</div>
                                                        <div class="col-md-6"> <?php echo e($client->timeZone); ?></div>

                                                        <div class="col-md-6"> Signing up date :</div>
                                                        <div class="col-md-6"> <?php echo e($client->created_at->format('d M Y - H:i:s')); ?></div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </p>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                <div class="container">
                    <div class="pageSubHeading">
                        Clicks on client invitation link
                    </div>
                    <?$i=1;?>
                    <?php $__currentLoopData = $affiliate->clicks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $click): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($click->client == 1): ?>
                          <span class="panelFormLabel"><?php echo e($i); ?>) click date: </span>  <?php echo e($click->created_at->format('d M Y - H:i:s')); ?>

                        <?php endif; ?>
                        <? $i++; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="pageSubHeading">
                    Assigned freelancers : <?php echo e(count($affiliate->freelancers)); ?> #
                </div><br/>
                <div class="container text-left">
                    <?php $__currentLoopData = $affiliate->freelancers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $freelancer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class="jobTitle">
                        <div  style="display: list-item;">
                            <strong><?php echo e($freelancer->firstName); ?><?php echo e($freelancer->lastName); ?></strong>
                        </div>
                        <div >
                            <a href="/<?php echo e($freelancer->username); ?>" target="_blank" class="btn btn-outline-primary btn-sm">Open resume</a>
                        </div>
                        </p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="container">
                    <div class="pageSubHeading">
                        Clicks on freelaner invitation link
                    </div>
                    <?$i=1;?>
                    <?php $__currentLoopData = $affiliate->clicks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $click): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($click->freelancer == 1): ?>
                            <span class="panelFormLabel"><?php echo e($i); ?>) click date: </span>  <?php echo e($click->created_at->format('d M Y - H:i:s')); ?>

                        <?php endif; ?>
                        <? $i++; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.affiliate-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>