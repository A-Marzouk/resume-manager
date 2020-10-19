<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>123 Workforce</title>
    <?php echo $__env->make('layouts.includes.styles', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body>
<?
    $curPage = url()->current();
    $admin = false;
    $isClient = true;

    if(strpos($curPage, 'client') !== false){
        $curPage = 'client';
    }else{
        $curPage = 'home';
    }

    $user = auth()->user();
    if($user){
        if($user->admin == 1){
            $admin = true;
        }
    }

    if(auth()->guard('client')->guest()){
        $isClient = false;
    }

?>

<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top">
        <a class="navbar-brand col-md-2 col-9" href="<?php echo e(url('/')); ?>">
            <img src="/images/newResume/123wf_logo.png" alt="logo">
        </a>
        <button class="navbar-toggler" id="navBarToggle" type="button" data-toggle="collapse" style="border: none;" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="background-image: url('/images/newResume/menu.png');"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav">
                
                <? if(!$isClient):?>
                    <a class="nav-item nav-link customNavLink <?if($curPage == 'client'):?>active<?endif;?>" href="/client/register/" data-toggle="modal" data-target="#exampleModalCenter">Become a client</a>
                <? endif; ?>
                <a class="nav-item nav-link customNavLink" href="#" data-toggle="modal" data-target="#talkToSales">Talk to sales</a>
            </ul>

            <!-- Right Side Of Navbar -->
            <li class="navbar-nav chatWithUsText">
                <? if($admin || (session()->get('admin') && session()->get('admin') == 'AdminWasHere')):?>
                <a class="nav-item nav-link customNavLink" href="/admin" style="color:#0290D8;">Admin-area</a>
                <?else :?>
                
                    
                    
                
                <? endif;?>
            </li>
            <ul class="navbar-nav">
                <!-- Authentication Links -->
                <li></li>
            <?php if(!$isClient): ?>
                    <li class="nav-link loginBtn">
                        <a href="<?php echo e(route('client.login')); ?>" data-toggle="modal" data-target="#loginModal" style="padding-left: 30px; padding-right: 30px;"><?php echo e(__('Log in')); ?></a>
                    </li>
                <? else: ?>
                    <a class="nav-item nav-link customNavLink" href="/chat-room" style="color:#0290D8;">
                        Messaging
                        <span id="MessagingClient<?php echo e(Auth::guard('client')->user()->id); ?>" class="unread" style="margin-left: 0;">
                            <?php echo e(Auth::guard('client')->user()->unreadMessages()); ?>

                        </span>
                    </a>
                    <a class="nav-item nav-link customNavLink" href="/client">
                        <?php echo e(Auth::guard('client')->user()->name); ?>

                    </a>
                    <a class="nav-item nav-link customNavLink" href="<?php echo e(route('client.logout')); ?>"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        <?php echo e(__('Logout')); ?>

                    </a>

                    <form id="logout-form" action="<?php echo e(route('client.logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                <? endif;?>
            </ul>
        </div>
    </nav>
    <?php echo $__env->make('admin.includes.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <main class="py-4" style="padding-bottom:0 !important;">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</div>


    
    <div class="chatMinimized d-none" id="chatMinBox">
    <a href="javascript:void(0)" class="row" id="chatMin">
        <div class="col-2 col-md-1 col-lg-2 chatImage">
        <span>
            <img src="/images/textsms_24px copy.png" width="16px">
        </span>
        </div>
        <div class="col-10 text">
            <span id="chatText">Chat with us!</span>
        </div>
    </a>
</div>

    
    <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    
    <div>
        <? if(!$admin):?>
            <?php echo $__env->make('includes.chat', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <? endif;?>
    </div>

    <?php echo $__env->make('layouts.includes.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('layouts.includes.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


</body>
</html>
