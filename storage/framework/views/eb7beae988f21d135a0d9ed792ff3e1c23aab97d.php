<?
    $errorType = 'client';
    if ($errors->has('email')){
        $errorType = $errors->first('type');
    }
    if(isset($page)){
        if($page == 'freelancerLogin'){
            $errorType = 'freelancer';
        }
        else if($page == 'affiliateLogin'){
            $errorType = 'affiliate';
        }
    }
?>
<div id="loginTabs">
    <ul class="nav nav-tabs row" role="tablist">
        <li class="nav-item customTab NoDecor col-4 text-center">
            <a class="text-center <?php if($errorType == 'freelancer'): ?>active <?php endif; ?>" href="#freelancerTab" role="tab" data-toggle="tab">
                Freelancer
            </a>
        </li>
        <li class="nav-item customTab NoDecor col-4 text-center">
            <a class="text-center <?php if($errorType == 'client'): ?>active <?php endif; ?>" href="#clientTab" role="tab" data-toggle="tab">
                Client
            </a>
        </li>
        <li class="nav-item customTab NoDecor col-4 text-center">
            <a class="text-center <?php if($errorType == 'affiliate'): ?>active <?php endif; ?>" href="#affiliateTab" role="tab" data-toggle="tab">
                Affiliate
            </a>
        </li>
    </ul>
</div>
<hr>
<div class="tab-content">
    <div role="tabpanel" class="tab-pane  <?php if($errorType == 'freelancer'): ?>active <?php endif; ?> firstItem" id="freelancerTab">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <?php if(auth()->guard()->check()): ?>
                    <div class="row" style="padding-top: 20px;">
                        <div class="col-12 text-center NoDecor">
                            <a style="color:#18A6DF;" href="/freelancer">
                                <div>
                                    <img src="/resumeApp/public/images/user.png" height="100px">
                                </div>
                                <?php echo e(auth()->guard()->user()->firstName); ?>

                            </a>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="customFormHeader" style="padding-top: 8px;"><?php echo e(__('Freelancer Log in')); ?></div>
                    <form method="POST" class="clientForm" action="<?php echo e(route('freelancer.login.submit')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="emailFreelancer" class="formLabel"><?php echo e(__('E-Mail Address')); ?></label>
                                    <input id="emailFreelancer" type="email" class="panelFormInput form-control<?php echo e($errors->has('email') && $errorType== 'freelancer'? ' is-invalid' : ''); ?>" name="email" value="<?php if($errorType == 'freelancer'): ?> <?php echo e(old('email')); ?> <?php endif; ?>" required autofocus>

                                    <?php if($errors->has('email') && $errorType== 'freelancer'): ?>
                                        <span class="invalid-feedback">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="formLabel forgotText"><?php echo e(__('Password')); ?>

                                        <a href="<?php echo e(route('password.request')); ?>">
                                            <?php echo e(__(' Forgot?')); ?>

                                        </a>
                                    </label>
                                    <input id="passwordFreelancer" type="password" class="panelFormInput form-control<?php echo e($errors->has('password') && $errorType== 'freelancer'? ' is-invalid' : ''); ?>" name="password" required>

                                    <?php if($errors->has('password') && $errorType== 'freelancer'): ?>
                                        <span class="invalid-feedback">
                                <strong><?php echo e($errors->first('password')); ?></strong>
                            </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label class="checkBoxText checkBoxContainer">
                                            <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                            <span class="rememberText">Remember Me</span>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="buttonMain text-center">
                                        <button type="submit" class="col-md-12 hireBtn">
                                            <?php echo e(__('Login')); ?>

                                        </button>
                                        <div class="smallText" style="background: none !important;">
                                            <a href="<?php echo e(route('freelancer.register')); ?>" style="background: none !important;"> Register now!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane <?php if($errorType == 'client'): ?>active <?php endif; ?> firstItem" id="clientTab">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <?php if(auth()->guard('client')->check()): ?>
                    <div class="row" style="padding-top: 20px;">
                        <div class="col-12 text-center NoDecor">
                            <a style="color:#18A6DF;" href="/client">
                                <div>
                                    <img src="/resumeApp/public/images/user.png" height="100px">
                                </div>
                                <?php echo e(auth()->guard('client')->user()->name); ?>

                            </a>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="customFormHeader" style="padding-top: 8px;"><?php echo e(__('Client Log in')); ?></div>
                    <div>
                        <form method="POST" class="clientForm" action="<?php echo e(route('client.login.submit')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="emailCLient" class="formLabel"><?php echo e(__('E-Mail Address')); ?></label>

                                        <div class="">
                                            <input id="emailCLient" type="email" class="panelFormInput form-control<?php echo e($errors->has('email') && $errorType== 'client' ? ' is-invalid' : ''); ?>" name="email" value="<?php if($errorType == 'client'): ?> <?php echo e(old('email')); ?> <?php endif; ?>" required autofocus>

                                            <?php if($errors->has('email')&& $errorType== 'client'): ?>
                                                <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="formLabel forgotText"><?php echo e(__('Password ')); ?>

                                            <a href="<?php echo e(route('client.password.reset')); ?>">
                                                <?php echo e(__(' Forgot?')); ?>

                                            </a>
                                        </label>


                                        <div>
                                            <input id="passwordClient" type="password" class="panelFormInput form-control<?php echo e($errors->has('password') && $errorType== 'client'? ' is-invalid' : ''); ?>" name="password" required>

                                            <?php if($errors->has('password') && $errorType== 'client'): ?>
                                                <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="checkBoxText form-check-label checkBoxContainer">
                                            <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                            Remember Me
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <div class="buttonMain text-cente">
                                            <button type="submit" class="col-md-12 hireBtn">
                                                <?php echo e(__('Login')); ?>

                                            </button>
                                            <div class="smallText" style="background: none !important;">
                                                    <span style="background: none !important;">
                                                        <a href="/client/register" style="background: none !important;"> Register now!</a>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane <?php if($errorType == 'affiliate'): ?>active <?php endif; ?> firstItem" id="affiliateTab">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <?php if(auth()->guard('affiliate')->check()): ?>
                    <div class="row" style="padding-top: 20px;">
                        <div class="col-12 text-center NoDecor">
                            <a style="color:#18A6DF;" href="/affiliate/dashboard">
                                <div>
                                    <img src="/resumeApp/public/images/user.png" height="100px">
                                </div>
                                <?php echo e(auth()->guard('affiliate')->user()->name); ?>

                            </a>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="customFormHeader" style="padding-top: 8px;"><?php echo e(__('Affiliate Log in')); ?></div>
                    <div>
                        <form method="POST" class="clientForm" action="<?php echo e(route('affiliate.login.submit')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="emailAffiliate" class="formLabel"><?php echo e(__('E-Mail Address')); ?></label>

                                        <div class="">
                                            <input id="emailAffiliate" type="email" class="panelFormInput form-control<?php echo e($errors->has('email')&& $errorType== 'affiliate' ? ' is-invalid' : ''); ?>" name="email" value="<?php if($errorType == 'affiliate'): ?> <?php echo e(old('email')); ?> <?php endif; ?>" required autofocus>

                                            <?php if($errors->has('email') && $errorType== 'affiliate'): ?>
                                                <span class="invalid-feedback">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="formLabel forgotText"><?php echo e(__('Password ')); ?>

                                            <a href="<?php echo e(route('affiliate.password.reset')); ?>">
                                                <?php echo e(__(' Forgot?')); ?>

                                            </a>
                                        </label>


                                        <div>
                                            <input id="passwordAffiliate" type="password" class="panelFormInput form-control<?php echo e($errors->has('password') && $errorType== 'affiliate' ? ' is-invalid' : ''); ?>" name="password" required>

                                            <?php if($errors->has('password') && $errorType== 'affiliate'): ?>
                                                <span class="invalid-feedback">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="checkBoxText form-check-label checkBoxContainer">
                                            <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                            Remember Me
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <div class="buttonMain text-cente">
                                            <button type="submit" class="col-md-12 hireBtn">
                                                <?php echo e(__('Login')); ?>

                                            </button>
                                            <div class="smallText" style="background: none !important;">
                                                <span style="background: none !important;">
                                                    <a href="/affiliate/register" style="background: none !important;"> Register now!</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>