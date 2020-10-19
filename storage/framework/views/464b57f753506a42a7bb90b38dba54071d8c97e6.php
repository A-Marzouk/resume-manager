<!-- Success Messages  -->
<?php if(session()->has('successMessage')): ?>
    <div class="row container">
        <div class="col-md-6">
            <div class="alert alert-success" style="margin-top: 30px;">
                <?php echo e(session()->get('successMessage')); ?>

            </div>
        </div>
    </div>

<?php endif; ?>
<?php if(session()->has('errorMessage')): ?>
    <div class="row container">
        <div class="col-md-6">
            <div class="alert alert-danger" style="margin-top: 30px;">
                <?php echo e(session()->get('errorMessage')); ?>

            </div>
        </div>
    </div>
<?php endif; ?>


<div class="changesSavedText d-none" id="changesSaved">
    <span class="alert alert-success">
        Changes saved
    </span>
</div>



<div class="changesSavedText d-none" id="copied">
    <span class="alert alert-success">
        Copied
    </span>
</div>


<audio id="chatAudio" class="d-none">
    <source src="/sounds/slow-spring-board.mp3" type="audio/ogg">
    Your browser does not support the audio element.
</audio>
