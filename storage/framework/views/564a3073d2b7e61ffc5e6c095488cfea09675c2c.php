<?php $__env->startSection('content'); ?>
    <div class="container">

        <div class="row">
            <div class="col-md-4" style="border-right: 1px solid lightgrey;">
                <p class="pageSubHeading2 text-left">
                    My jobs
                </p>
                <?php if(count($freelancerJobs) < 1): ?>
                    <p class="panelFormLabel"> You have not applied to any job yet.</p>
                <?php endif; ?>
                <div>
                    <?php $__currentLoopData = $freelancerJobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "><?php echo e($job->title); ?></div><br/>
                        <div  style="color: #30323D;font-family: Roboto;">Description : <?php echo e($job->description); ?></div>
                        <div  style="color: #30323D;font-family: Roboto;">Budget : <?php echo e($job->budget); ?></div>
                        <br/>
                        <div>
                            <?php if($currFreelancer->hasApplied($job->id)): ?>
                                <span style="color: greenyellow" id="applied<?php echo e($job->id); ?>">Applied</span> &nbsp;
                                <button href="javascript:void(0)" id="cancelApply<?php echo e($job->id); ?>" class="cancelApplyBtn btn btn-small btn-outline-danger">Cancel application</button>
                            <?php else: ?>
                                <a href="#" class="btn btn-outline-primary">Apply</a>
                            <?php endif; ?>
                        </div>
                        <hr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="col-md-8">
                <p class="pageSubHeading2 text-left">
                    Recent jobs
                </p>
                <div>
                    <?php $__currentLoopData = $allJobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($currFreelancer->hasApplied($job->id)): ?>
                            <?php continue; ?>
                        <?php endif; ?>
                        <div style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "><?php echo e($job->title); ?></div><br/>
                        <div  style="color: #30323D;font-family: Roboto;">Description : <?php echo e($job->description); ?></div>
                        <div  style="color: #30323D;font-family: Roboto;">Budget : <?php echo e($job->budget); ?></div>
                        <br/>
                        <div>
                            <button href="javascript:void(0)" id="applyToJob<?php echo e($job->id); ?>" class="applyToJobBtn btn btn-outline-primary">Apply</button>
                        </div>
                        <hr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>