<?php $__env->startSection('content'); ?>
    <div style="padding-top: 20px;">
        <?php if(session()->has('successMessage')): ?>
            <div class="alert alert-success" id="successMessage">
                <?php echo e(session()->get('successMessage')); ?>

            </div>
        <?php endif; ?>
    </div>


    <div class="paymentAndCard">
        <?php echo $__env->make('freelancer_card_small', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="paymentContainer">
            <div class="row">
                <div class="col-md-6 col-12 paymentOptsCont">
                    <div class="paymentHeader">
                        Payment Options
                    </div>
                    <div class="paymentOption">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <img src="/images/checked_method.png" alt="" style="padding-bottom: 2px;padding-right: 6px;width: 23px;">
                                <span class="paymentText font-weight-bold">Stripe</span>
                                <div class="paymentNote NoDecor" style="font-weight: normal; color:#72808E;">
                                    Complete your purchase securely with <a href="https://stripe.com" target="_blank">Stripe</a>.
                                </div>
                            </div>
                            <div class="col-md-6 col-12 stripeImage">
                                <img src="/images/stripe-logo.png" alt="stripe logo" width="90" height="24">
                            </div>
                        </div>
                        <div class="row" style="padding-top:30px;">
                            <div class="col-md-12">
                                <form action="/stripe/payments/pay" method="POST" id="stripeForm<?php echo e($freelancer->id); ?>">

                                    <?php echo e(csrf_field()); ?>


                                    <input type="hidden" value="<?php echo e($amountToPay); ?>" name="amountToPay">
                                    <input type="hidden" value="<?php echo e($freelancer->userData->name); ?>" name="freelancerName">
                                    <input type="hidden" value="<?php echo e($freelancer->id); ?>" name="freelancerID">
                                    <input type="hidden" value="<?php echo e($hours); ?>" name="hours">
                                    <input type="hidden" value="<?php echo e($weeks); ?>" name="weeks">
                                    <input type="hidden" value="hireFreelancer" name="paymentInfo">
                                    <script
                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="<?php echo e(env('STRIPE_KEY')); ?>"
                                            data-amount="<?php echo e($amountToPay); ?>"
                                            data-name="Hire  <?php echo e($freelancer->userData->name); ?>"
                                            data-description="For <?php echo e($hours); ?>"
                                            data-image="/images/newResume/logo.png"
                                            data-locale="auto">
                                    </script>
                                    <script>
                                        document.getElementsByClassName("stripe-button-el")[0].style.display = 'none';
                                    </script>
                                    <div class="row text-center">
                                        <div class="col-md-10 offset-md-1" style="padding-top: 0; margin-top: 0;">
                                            <button class="btn-block summaryBtn cursorPointerOnHover" style="padding-top: 5px;" type="submit">Pay via Stripe</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="paymentOption">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <img src="/images/checked_method.png" alt="" style="padding-bottom: 2px;padding-right: 6px;width: 23px;">
                                <span class="paymentText font-weight-bold">PayPal</span>
                                <div class="paymentNote NoDecor" style="font-weight: normal; color:#72808E;">
                                    Complete your purchase securely with <a href="https://paypal.com" target="_blank">PayPal</a>.
                                </div>
                            </div>
                            <div class="col-md-6 col-12 stripeImage">
                                <img src="/images/paypal-logo.png" alt="paypal logo" width="90" height="42">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <form action="<?php echo e(route('paypal.express-checkout')); ?>" method="POST">
                                    <?php echo e(csrf_field()); ?>


                                    <input type="hidden" class="form-control panelFormInput" id="amount" name="amountToPay" value="<?php echo e((intval($freelancer->userData->salary)+5) * $hours); ?>" required>
                                    <input type="hidden" value="<?php echo e($freelancer->userData->name); ?>" name="freelancerName">
                                    <input type="hidden" value="Hire : <?php echo e($freelancer->userData->name); ?>" name="description">
                                    <input type="hidden" value="<?php echo e($freelancer->id); ?>" name="freelancerID">
                                    <input type="hidden" value="<?php echo e($hours); ?>" name="hours">
                                    <input type="hidden" value="hireFreelancer" name="paymentType">
                                    <?php if(!auth()->guard('client')->guest()): ?>
                                        <input type="hidden" name="client_id" value="<?php echo e(auth()->guard('client')->user()->id); ?>">
                                        <input type="hidden" name="client_email" value="<?php echo e(auth()->guard('client')->user()->email); ?>">
                                    <?php endif; ?>
                                    <input type="hidden" value="<?php echo e($weeks); ?>" name="weeks">

                                    <div class="row text-center" style="padding-top: 30px">
                                        <div class="col-md-10 offset-md-1" style="padding-top: 0; margin-top: 0;">
                                            <button class="btn-block summaryBtn cursorPointerOnHover" style="padding-top: 5px;" type="submit">Pay via PayPal</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12 paymentDetailsCont">
                    <div class="paymentHeader showOnlyOnmd">
                        Payment Details
                    </div>
                    <div class="paymentDetails">
                        <div class="row">
                            <div class="col-md-6 col-6 paymentText" style="color: #697786;">
                                Hourly rate :
                            </div>
                            <div class="col-md-6 col-6 text-right paymentText font-weight-bold" style="color: #697786;">
                                <?php echo e(intval($freelancer->userData->salary)+5); ?> $
                            </div>
                        </div>
                        <div class="row border-bottom" style="padding-top: 20px; padding-bottom: 40px;">
                            <div class="col-md-6 col-6 paymentText" style="color: #697786;">
                                <?php echo e($hours); ?> hours
                            </div>
                            <div class="col-md-6 col-6 text-right paymentText font-weight-bold" style="color: #697786;">
                                x <?php echo e($hours); ?>

                            </div>
                        </div>
                        <div class="row" style="padding-top: 20px; padding-bottom: 30px;">
                            <div class="col-md-6 col-12 paymentText totalPayText" style="color: #697786; font-size: 18px;">
                                Total to Pay <span class="d-none d-md-inline-flex">:</span>
                            </div>
                            <div class="col-md-6 col-12 text-right totalPayText paymentText font-weight-bold" style="color: #697786; font-size: 18px;">
                                <?php echo e((intval($freelancer->userData->salary)+5) * $hours); ?> $
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.client-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>