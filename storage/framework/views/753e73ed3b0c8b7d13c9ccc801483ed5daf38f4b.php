<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div>
                    Job title : <?php echo e($job->title); ?>

                </div>
                <div>
                    Descreption : <?php echo e($job->description); ?>

                </div>
            </div>
            <div class="col-md-4">
                <div>
                    Level : <?php echo e($job->level); ?>

                </div>
                <div>
                    Budget : <?php echo e($job->budget); ?>

                </div>
                <div>
                    Client name : <?php echo e(\App\Client::find($job->client_id)->name); ?>

                </div>
                <div>
                    <?php if(!empty($job->job_attachment)): ?>
                        Attachment :
                        <a href="/<?php echo e($job->job_attachment); ?>" >Open file </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php if(auth()->user()): ?>
                    <?php $currFreelancer = auth()->user(); ?>
                    <?php if($currFreelancer->hasApplied($job->id)): ?>
                        <span style="color: greenyellow" id="applied<?php echo e($job->id); ?>">Applied</span> &nbsp;
                        <button href="javascript:void(0)" id="cancelApply<?php echo e($job->id); ?>" class="cancelApplyBtn btn btn-small btn-outline-danger">Cancel application</button>
                    <?php else: ?>
                        <div>
                            <button href="javascript:void(0)" id="applyToJob<?php echo e($job->id); ?>" class="applyToJobBtn btn btn-outline-primary">Apply</button>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <a href="<?php echo e(route('freelancer.login')); ?>" class="btn btn-outline-primary">Login to apply</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>