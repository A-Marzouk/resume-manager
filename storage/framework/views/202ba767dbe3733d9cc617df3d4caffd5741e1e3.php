<div role="tabpanel" class="tab-pane" id="jobs">
    <br/>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Job title</th>
            <th scope="col">Job owner</th>
            <th scope="col">Budget</th>
            <th scope="col">&nbsp;</th>
            <th scope="col">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <? $i=1; ?>
        <? foreach ($jobs as $job):?>
        <tr id="selectedRowJob<?php echo e($job->id); ?>">
            <th scope="row">
                <!-- check boxes -->
                <label class="form-check-label col-md-3 checkBoxContainer checkBoxText">
                    <input  style="<?php if($errors->has('availableHours')): ?> border:1px solid red; <?php endif; ?>" class="form-check-input" id="selectedJob<?php echo e($job->id); ?>" type="checkbox" name="selectedJobs[]" value="<?php echo e($job->id); ?>">
                    <span class="checkmark"></span>
                </label>
            </th>
            <td>
                <?php echo e($job->title); ?>

            </td>
            <td>
                <a href="<?php echo e(route('logInAsClient',$job->client_id)); ?>" target="_blank">
                    <?php echo e(\App\Client::find($job->client_id)->email); ?>

                </a>
            </td>
            <td><?php echo e($job->budget); ?></td>
            <td><a href="<?php echo e(route('jobs.view_single',$job->id)); ?>" class="btn btn-sm btn-outline-primary" target="_blank">View job post</a></td>
            <td>
                <a href="<?php echo e(route('admin.invite.page',$job->id)); ?>" class="btn btn-sm btn-outline-primary" target="_blank">Invite</a>
            </td>
        </tr>

        <? $i++;?>
        <? endforeach;?>
        </tbody>
    </table>
</div>