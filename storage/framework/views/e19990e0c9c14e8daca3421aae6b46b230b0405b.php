<div role="tabpanel" class="tab-pane active" id="home">
    <div class="container">
        <div class="row">
            <div class="col-md-6 addDesigner">
                <form action="/freelancer/behance/save_user" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <label for="languages"  class="panelFormLabel">Add a designer from Behance</label>
                        <input type="text" placeholder="Behance user profile link.." class="form-control panelFormInput" id="languages" name="behanceDesignerLink" value="" required>
                    </div>
                    <div class="buttonMain">
                        <button type="submit" class="btn-block hireBtn">Add Behance designer</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4 bookingsBox">
                <div class="centerVertically">
                    <span class="buttonMain">
                        <a href="<?php echo e(route('bookings.calendar.page')); ?>" class="hireBtn" style="padding-left: 20px; padding-right: 20px;">Bookings calendar</a>
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 adminBox">
                <p class="panelFormLabel" style="font-size: 18px;"># Freelancers</p>
                <p class="panelFormLabel"> Total : <?php echo e(count($users)); ?> </p>
            </div>

            <div class="col-md-2 adminBox">
                <p class="panelFormLabel" style="font-size: 20px;"># Clients</p>
                <p class="panelFormLabel"> Total : <?php echo e(count($clients)); ?> </p>
            </div>
        </div>
    </div>
</div>