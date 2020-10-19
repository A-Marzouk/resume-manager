<div role="tabpanel" class="tab-pane" id="freelancers">

    <br/>
    <ul class="nav nav-tabs" style="border: none;" role="tablist">
        <li class="col-md-2">
            <a class="btn btn-block btn-outline-primary active" href="#designers" role="tab" data-toggle="tab">
                Designers
            </a>
        </li>
        <li class="col-md-2">
            <a class="btn btn-block btn-outline-primary" href="#developers" role="tab" data-toggle="tab">
                Developers
            </a>
        </li>
        <li class="col-md-2">
            <a class="btn btn-block btn-outline-primary" href="#behanceDesigners" role="tab" data-toggle="tab">
                Behance designers
            </a>
        </li>
        <li class="col-md-2">
            <a class="btn btn-block btn-outline-primary" href="<?php echo e(route('view.business.support.users')); ?>">
                Business support
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <?php echo $__env->make('admin.includes.freelancers_includes.designers', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('admin.includes.freelancers_includes.developers', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('admin.includes.freelancers_includes.behance_designers', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>