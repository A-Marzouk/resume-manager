<div role="tabpanel" class="tab-pane" id="affiliates">
    <br/>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Unique FREELANCER invite link</th>
            <th scope="col">Unique CLIENT invite link</th>
        </tr>
        </thead>
        <tbody>
        <? $i=1; ?>
        <? foreach ($owners as $owner):?>
        <tr id="selectedRowOwner<?php echo e($owner->id); ?>">
            <th scope="row">
                <!-- check boxes -->
                <label class="form-check-label col-md-3 checkBoxContainer checkBoxText">
                    <input  style="<?php if($errors->has('availableHours')): ?> border:1px solid red; <?php endif; ?>" class="form-check-input" id="selectedOwner<?php echo e($owner->id); ?>" type="checkbox" name="selectedOwners[]" value="<?php echo e($owner->id); ?>">
                    <span class="checkmark"></span>
                </label>
            </th>
            <td>
                <a href="<?php echo e(route('view.affiliate.profile',$owner->id)); ?>" target="_blank"><?php echo e($owner->name); ?></a>
            </td>
            <td><?php echo e($owner->email); ?></td>
            <td>
                <span class="oneLineHiddenOverflow" id="uniqueLink_<?php echo e($owner->id); ?>">Https://123workforce.com/freelancer/workforce/register?ownerCode=<?php echo e($owner->code); ?></span>
                <a href="javascript:void(0)" class="btn btn-outline-primary btn-sm copyLinkBtn" id="copyLinkBtn_<?php echo e($owner->id); ?>">Copy</a>
            </td>
            <td>
                <span class="oneLineHiddenOverflow" id="uniqueClientLink_<?php echo e($owner->id); ?>">Https://123workforce.com/client/register?ownerCode=<?php echo e($owner->code); ?></span>
                <a href="javascript:void(0)" class="btn btn-outline-primary btn-sm copyClientLinkBtn" id="copyClientLinkBtn_<?php echo e($owner->id); ?>">Copy</a>
            </td>

        </tr>

        <? $i++;?>
        <? endforeach;?>
        </tbody>
    </table>
</div>