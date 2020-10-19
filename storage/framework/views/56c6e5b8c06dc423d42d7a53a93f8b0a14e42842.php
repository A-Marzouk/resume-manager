<div role="tabpanel" class="tab-pane" id="clients">
    <br/>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Full Name</th>
            <th scope="col">Link to Profile</th>
            <th scope="col" class="text-center">View details</th>
            <th scope="col" class="text-center">Bookings history</th>
            <th scope="col" class="text-center">Affiliate's name</th>
            <th scope="col" class="text-center">Invoices</th>
            <th scope="col" class="text-center">Services</th>
            <th scope="col" class="text-center">Usage based Subscriptions</th>
        </tr>
        </thead>
        <tbody>
        <? $i=1; ?>
            <? foreach ($clients as $client):?>
        <tr id="selectedRowClient<?php echo e($client->id); ?>">
            <th scope="row">
                <!-- check boxes -->
                <label class="form-check-label col-md-3 checkBoxContainer checkBoxText">
                    <input  style="<?php if($errors->has('availableHours')): ?> border:1px solid red; <?php endif; ?>" class="form-check-input" id="selectedClient<?php echo e($client->id); ?>" type="checkbox" name="selectedClients[]" value="<?php echo e($client->id); ?>">
                    <span class="checkmark"></span>
                </label>
            </th>
            <td><?php echo e($client->name); ?></td>
            <td><a href="<?php echo e(route('logInAsClient',$client->id)); ?>" target="_blank">Link to profile</a></td>
            <td class="text-center">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#clientDetails<?php echo e($client->id); ?>">
                    Details
                </button>

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
            </td>
            <td class="text-center">
                <a href="<?php echo e(route('show.bookings_history',$client->id)); ?>" class="btn btn-outline-primary">Booking history</a>
            </td>
            <td class="panelFormLabel text-center">
                <?php if(isset($client->affiliate)): ?>
                    <?php echo e($client->affiliate->name); ?>

                <?php else: ?>
                    <div style="color:red;">
                        Not assigned
                    </div>
                <?php endif; ?>
            </td>
            <td class="text-center">
                <a href="<?php echo e(route('show.invoices.page',$client->id)); ?>" class="btn btn-outline-primary">Invoices</a>
            </td>

            <td class="text-center">
                <a href="<?php echo e(route('show.services.page',$client->id)); ?>" class="btn btn-outline-primary">Services</a>
            </td>

            <td class="text-center">
                <a href="<?php echo e(route('show.subscriptions.page',$client->id)); ?>" class="btn btn-outline-primary">Subs</a>
            </td>
        </tr>

        <? $i++;?>
        <? endforeach;?>
        </tbody>
    </table>
</div>