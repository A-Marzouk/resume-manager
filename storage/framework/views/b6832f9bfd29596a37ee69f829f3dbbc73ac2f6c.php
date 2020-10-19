
<div role="tabpanel" class="tab-pane" id="behanceDesigners">
    <br/>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Full Name</th>
            <th scope="col">Behance profile</th>
            <th scope="col">Location</th>
            <th scope="col">Occupation</th>
            <th scope="col">Homepage freelancer</th>
            <th scope="col" class="text-center">Short resume</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?
            use App\UserData;
            $i=1;
        ?>
        <? foreach ($users as $user):?>
        <?
        $userData3 = $user->userData ;
        if(!isset($userData3)){
            continue;
        }
        ?>
        <?
        $isBehanceUser = false;
        if (strpos($user->username, 'BeUser') !== false) {
            $isBehanceUser = true;
            $userData = UserData::where('user_id',$user->id)->first();
        }
        ?>
        <? if($user->admin == 1 || $user->firstName === 'Visitor' ||  !$isBehanceUser){ continue;}?>

        <tr id="selectedRowBUser<?php echo e($user->id); ?>">
            <th scope="row">
                <!-- check boxes -->
                <label class="form-check-label col-md-3 checkBoxContainer checkBoxText">
                    <input  style="<?php if($errors->has('availableHours')): ?> border:1px solid red; <?php endif; ?>" class="form-check-input" id="selectedUser<?php echo e($user->id); ?>" type="checkbox" name="selectedUsers[]" value="<?php echo e($user->id); ?>">
                    <span class="checkmark"></span>
                </label>
            </th>
            
            <td><?php echo e($userData->name); ?></td>
            
            <td><a href="<?php echo e($userData->behanceLink); ?>" target="_blank">Behance profile</a></td>
            
            <td><?php echo e($userData->city); ?></td>
            
            <td><?php echo e($userData->jobTitle); ?></td>

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
            <td><a class="btn btn-primary btn-sm" href="<?php echo e(route('logInAsUser',$user->id)); ?>">Open form</a></td>
            <td><a class="btn btn-default btn-sm" href="/v2/<?php echo e($user->username); ?>">Open Resume</a></td>
        </tr>


        <? $i++;?>
        <? endforeach;?>
        </tbody>
    </table>
</div>