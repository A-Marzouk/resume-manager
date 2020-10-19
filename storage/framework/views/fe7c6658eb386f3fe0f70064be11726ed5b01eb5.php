<?php $__env->startSection('content'); ?>
    <div class="container" id="invoice">
        <div class="row">
            <div class="offset-md-2 col-md-8">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div>
                            <img src="/images/newResume/123wf_logo.png" alt="logo" width="100%">
                        </div>
                        <div style="padding-top: 10px;">
                            <img src="/images/invoice/invoice_word.png" alt="word" width="99%">
                        </div>
                        <div class="invoiceNumber">
                            Invoice Number <?php echo e($invoice->unique_number); ?>

                        </div>

                        <div class="agentName">
                            Name of Agents :<br/>
                            <?php if(isset($invoice->user)): ?>
                                <?php echo e($invoice->user->firstName); ?> <?php echo e($invoice->user->lastName); ?>

                            <?php endif; ?>
                            <? $users = [] ;?>
                            <?php $__currentLoopData = $invoice->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $service->agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?
                                     $users[$user->id] = $user->firstName . ' ' .$user->lastName ;
                                    ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = array_unique($users); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                - <?php echo e($name); ?> <br/>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="termsText">
                            Invoice issue date    : <?php echo e($invoice->created_at->format('d.m.Y')); ?>

                        </div>
                        <div class="termsText">
                            Status     :
                            <?php if($invoice->status === 'Paid'): ?> <span style="color:lightgreen; font-size:16px;">Paid</span>
                            <?php else: ?>
                                <span style="color:orange; font-size:16px;">Unpaid</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-4 offset-md-4 d-none d-md-block">
                        <div>
                            <img src="/images/invoice/circle_logo.png" alt="word" width="auto" height="150px">
                        </div>
                    </div>
                </div>
                <div class="row clientInfo">
                    <div class="col-4">
                        CLIENT NAME
                    </div>
                    <div class="col-4">
                        CLIENT COMPANY
                    </div>
                    <div class="col-4">
                        CLIENT CONTACT
                    </div>
                </div>

                <div class="row clientInfo_detail">
                    <div class="col-4">
                        <?php echo e($invoice->client->name); ?>

                    </div>
                    <div class="col-4">
                        <?php echo e($invoice->client->agency); ?>

                    </div>
                    <div class="col-4" style="border: none; word-break: break-word;">
                         <?php echo e($invoice->client->phone); ?><br/>
                         <?php echo e($invoice->client->email); ?>

                    </div>
                </div>


                <?php if(count($invoice->services) > 0): ?>
                    <div class="termsText">
                        <div class="blueLine" style="margin-bottom: 10px;background-color: lightblue"></div>
                        Custom services :
                    </div>

                    <?php $__currentLoopData = $invoice->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row clientInfo">
                            <div class="col-3">
                                SERVICE
                            </div>
                            <div class="col-3">
                                HOURS
                            </div>
                            <div class="col-3">
                                RATE
                            </div>
                            <div class="col-3">
                                DAYS
                            </div>
                        </div>

                        <div class="row clientInfo_detail">
                            <div class="col-3">
                                <?php echo e($service->title); ?>

                            </div>
                            <div class="col-3 text-left">
                                <?php echo e($service->hours); ?> hours
                            </div>
                            <div class="col-3">
                                <?php echo e($service->rate); ?>

                            </div>
                            <div class="col-3" style="border: none; word-break: break-word;">
                                <?php if($service->days === 'all_days'): ?> All business days <?php else: ?> <?php echo e($service->days); ?> <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="blueLine" style="margin-bottom: 10px;margin-top: 10px;background-color: lightblue"></div>

                <?php endif; ?>



                <div class="row clientInfo">
                    <div class="col-4">
                        SERVICES PROVIDED
                    </div>
                    <div class="col-2">
                        NO. OF HRS / WEEK
                    </div>
                    <div class="col-2">
                        TOTAL DUE
                    </div>
                    <div class="col-2">
                        CURRENCY
                    </div>
                </div>
                <div class="row clientInfo_detail">
                    <div class="col-4 text-left">
                        <?php $__currentLoopData = $invoice->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($service->title); ?><br/>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if(count($invoice->services) == 0): ?>
                            <?php echo e($invoice->service); ?>

                        <?php endif; ?>
                    </div>
                    <div class="col-2">
                        <?php echo e($invoice->hours); ?>

                    </div>
                    <div class="col-2">
                        <?php echo e($invoice->total_amount); ?>

                    </div>
                    <div class="col-2" style="border: none;">
                        <?php echo e($invoice->currency); ?>

                    </div>
                </div>

                <div class="row buttonsRow" style="padding: 15px;">
                    <?php if(in_array('stripe',explode(',',$invoice->payment_options))): ?>
                        <div class="col-12">
                            <form action="/stripe/payments/pay" method="POST">
                                <?php echo e(csrf_field()); ?>

                                <div class="d-none">
                                    <input type="text" value="<?php echo e($invoice->total_amount); ?>" id="amountToPay" name="amountToPay">
                                    <!-- amount to pay -->
                                    <input type="text" value="<?php echo e($invoice->service); ?>" id="description" name="description">
                                    <!-- description -->
                                </div>

                                <input type="hidden" value="invoice" name="paymentInfo">
                                <input type="hidden" value="<?php echo e($invoice->id); ?>" name="invoice_id">
                                <input type="hidden" value="<?php echo e($invoice->client->id); ?>" name="client_id">
                                <input type="hidden" value="<?php echo e($invoice->hours); ?>" name="hours">
                                <input type="hidden" value="<?php echo e($invoice->currency); ?>" name="currency">
                                <?php if(in_array('recurring',explode(',',$invoice->payment_options))): ?>
                                    <div class="form-group col-md-12">
                                        <label for="weeks" class="panelFormLabel">Recurring payments <small><br/>(Leave empty for one time payment)</small></label>
                                        <select name="weeks" id="weeks" class="custom-select panelFormInput">
                                            <option value="" selected disabled>-- Select --</option>
                                            <option value="pay_as_you_go">Pay as you go</option>
                                            <option value="1">1 week</option>
                                            <?php for($i=2;$i<=54;$i++): ?>
                                                <option value="<?php echo e($i); ?>"><?php echo e($i); ?> weeks</option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                <?php endif; ?>
                                <script
                                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                        data-key="<?php echo e(env('STRIPE_KEY')); ?>"
                                        data-amount=""
                                        data-name="123 Workforce"
                                        data-description="Custom payment"
                                        data-image="/images/newResume/logo.png"
                                        data-locale="auto"
                                        id="customPayment">
                                </script>
                                <script>
                                    document.getElementsByClassName("stripe-button-el")[0].style.display = 'none';
                                </script>
                                <div class="buttonMain whiteBg col-md-8 offset-md-2" style="margin-top: 10%;padding-top: 10px; padding-bottom: 10px;">
                                    <button class="hireBtn btn-block hire" type="submit">Pay via Stripe</button>
                                </div>
                            </form>
                        </div>
                    <?php endif; ?>
                    <?php if(in_array('paypal',explode(',',$invoice->payment_options))): ?>
                        <div class="col-12">
                                <form action="<?php echo e(route('paypal.express-checkout')); ?>" method="POST">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="hidden" value="<?php echo e($invoice->total_amount); ?>" name="amountToPay" required>
                                    <!-- amount to pay -->
                                    <input type="hidden" value="<?php echo e($invoice->service); ?>"  name="description" required>
                                    <!-- description -->
                                    <input type="hidden" name="custom_payment" value="true" required>
                                    <input type="hidden" name="invoice_id" value="<?php echo e($invoice->id); ?>" required>
                                    
                                    <?php if(in_array('recurring_removed',explode(',',$invoice->payment_options))): ?>
                                        <div class="form-group col-md-12">
                                            <label for="weeks" class="panelFormLabel">Recurring payments <small><br/>(Leave empty for one time payment)</small></label>
                                            <input type="number" placeholder="Number of weeks.." min="0" max="24" id="weeks" class="panelFormInput form-control" name="weeks">
                                        </div>
                                    <?php endif; ?>
                                    <div class="buttonMain whiteBg col-md-8 offset-md-2" style="margin-top: 10%;padding-top: 10px; padding-bottom: 25px;">
                                        <button class="hireBtn btn-block hire" type="submit">Pay via PayPal</button>
                                    </div>
                                </form>
                            </div>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="termsText">
                            Terms of payment - Weekly in advance <br/>
                            Contract - Weekly <br/>
                            <div class="NoDecor">
                                <a href="https://123workforce.com/workforce/campaign_briefs/<?php echo e($invoice->campaign_brief_id); ?>" target="_blank">
                                    View related Campaign Brief
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="padding-top:15px; ">
                    <div class="col-md-8 col-12">
                        <img src="/images/invoice/payment-systems.png" alt="payment" width="100%">
                    </div>
                    <div class="col-12" style="padding-top: 25px;">
                        <a href="<?php echo e(route('invoice.to.pdf',$invoice->unique_number)); ?>"  target="_blank" class="btn btn-primary">Export as PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>