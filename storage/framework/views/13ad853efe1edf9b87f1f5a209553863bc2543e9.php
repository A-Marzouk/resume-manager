<div role="tabpanel" class="tab-pane active" id="designers">
    <br/>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Full Name</th>
            <th scope="col">Link to Resume</th>
            <th scope="col">Hourly / Monthly Rate </th>
            <th scope="col"></th>
            <th scope="col">Empty Fields</th>
            <th scope="col">Approval</th>
            <th scope="col" class="text-center">Bookings</th>
            <th scope="col" class="text-center">Homepage freelancer</th>
            <th scope="col" class="text-center">Short resume</th>
            <th scope="col" class="text-center">Owner's name</th>
        </tr>
        </thead>
        <tbody>
        <? use App\UserData;foreach ($users as $user):?>

        <?
        $isBehanceUser = false;
        if (strpos($user->username, 'BeUser') !== false) {
            $isBehanceUser = true;
            $userData = UserData::where('user_id',$user->id)->first();
        }
        ?>
        <?
        $userData3 = $user->userData ;
        if(!isset($userData3)){
            continue;
        }
        ?>
        <? if($user->admin == 1 || $user->firstName === 'Visitor' || $user->profession != 'Designer' || $isBehanceUser ){ continue;}?>

        <tr id="selectedRowUser<?php echo e($user->id); ?>">
            <th scope="row">
                <!-- check boxes -->
                <label class="form-check-label col-md-3 checkBoxContainer checkBoxText">
                    <input  style="<?php if($errors->has('availableHours')): ?> border:1px solid red; <?php endif; ?>" class="form-check-input" id="selectedUser<?php echo e($user->id); ?>" type="checkbox" name="selectedUsers[]" value="<?php echo e($user->id); ?>">
                    <span class="checkmark"></span>
                </label>
            </th>
            <td><?php echo e($user->firstName); ?> <?php echo e($user->lastName); ?></td>
            <td><a href="/v2/<?php echo e($user->username); ?>" target="_blank">Resume</a></td>
            <td><?php echo e($user->userData->salary ?? 0); ?> / <?php echo e($user->userData->salary_month ?? 0); ?></td>
            <td><a class="btn btn-primary btn-sm" href="<?php echo e(route('logInAsUser',$user->id)); ?>">Open form</a>
            </td>
            <? if($user->isComplete()):?>
            <td>
                <span style="color: lawngreen;">Profile Complete</span>
            </td>
            <? else:?>
            <td>

                <a href="jacascript:void(0)" class="btn btn-outline-info" data-target="#fields<?php echo e($user->id); ?>" data-toggle="collapse">
                    <?php echo e(count($user->emptyFields)); ?>

                </a>

                <div id="fields<?php echo e($user->id); ?>" class="collapse">
                    <br/>
                    <? foreach ($user->emptyFields as $data):?>
                    <li><?php echo e($data); ?></li>
                    <? endforeach;?>
                </div>

            </td>

            <? endif;?>
            <td id="status<?php echo e($user->id); ?>">
                <?php if($user->userData->approved): ?>
                    <span style="color: lawngreen">Approved</span>
                <?php else: ?>
                    Not approved
                <?php endif; ?>
            </td>
            <td>
                <? $finishedBookings =  0 ;?>
                <?php $__currentLoopData = $user->bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?
                    $clientName = 'Visitor' ;
                    if($booking->client_id){
                        $clientName = App\Client::where('id',$booking->client_id)->first()->name ;
                    }
                    ?>
                    <?php if(!$booking->canceled): ?>
                        <div class="panelFormLabel text-center" id="bookingStatus<?php echo e($booking->id); ?>">
                            <div>
                                <b><?php echo e($booking->hours); ?></b> hours - <b><?php echo e($booking->weeks); ?></b> weeks to <b><?php echo e($clientName); ?></b>
                            </div><br/>
                            <b><?php echo e($booking->booking_email); ?></b><br/>
                            <a href="javascript:void(0)" class="btn btn-sm btn-default releaseBooking" id="addHoursBtn<?php echo e($booking->id); ?>">Add hours back</a>
                        </div>
                        <hr width="50%">
                    <?php else: ?>
                        <? $finishedBookings++; ?>
                    <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if($finishedBookings): ?>
                    <div class="panelFormLabel NoDecor text-center">
                        Finished bookings : <span id="finishedBookings<?php echo e($user->id); ?>"><?php echo e($finishedBookings); ?></span>
                    </div>
                <?php endif; ?>
            </td>
            <td>
                <?php if($user->userData->home_page_freelancer): ?>
                    <a href="javascript:void(0)" id="removeFreelancerFromHomePage<?php echo e($user->id); ?>" class="btn btn-default removeFreelancerFromHomePage">Remove</a>
                <?php else: ?>
                    <a href="javascript:void(0)" id="addFreelancerToHomePage<?php echo e($user->id); ?>" class="btn btn-default addFreelancerToHomePage">Add</a>
                <?php endif; ?>
            </td>
            <td>
                <?php if($user->userData->short_resume == 0): ?>
                    <a href="javascript:void(0)" id="enableFreelancerShortResume<?php echo e($user->id); ?>" class="btn btn-default enableFreelancerShortResume">Enable short resume</a>
                <?php else: ?>
                    <a href="javascript:void(0)" id="disableFreelancerShortResume<?php echo e($user->id); ?>" class="btn btn-default disableFreelancerShortResume">Disable short resume</a>
                <?php endif; ?>
            </td>
            <td class="panelFormLabel text-center">
                <?php echo e($user->owner['name']); ?>

            </td>
        </tr>

        <? endforeach;?>
        </tbody>
    </table>
</div>
