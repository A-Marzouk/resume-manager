<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700&display=swap" rel="stylesheet">
    <title>123 Workforce</title>
    <?php echo $__env->make('layouts.includes.styles', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body style="background: white !important; margin-top:33px !important;">
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

<img src="/images/home/mainBg-designers.svg" alt="" class="topBg">
<div id="app">
    <nav class="navbar nav-home-designers">
        <a href="<?php echo e(url('/')); ?>">
            <img class="logo hideOnSm" src="/images/home/123workforce.png" alt="logo">
            <img class="logo showOnSm" src="/images/home/icon123.png" alt="" />
        </a>
        

        <div id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav">

            </ul>

            <!-- Right Side Of Navbar -->
            <li class="navbar-nav chatWithUsText">
                <? if($admin || (session()->get('admin') && session()->get('admin') == 'AdminWasHere')):?>
                <a class="nav-item nav-link customNavLink" href="/admin" style="color:#0290D8;">Admin-area</a>
                <?else :?>
                
                
                
                
                <? endif;?>
            </li>
            <ul class="navbar-nav d-flex align-items-center">
                <!-- Authentication Links -->
                
                <?php if(!$isClient): ?>

                <a class="nav-item customNavLink nav-link text-blue" href="<?php echo e(route('client.login')); ?>" data-toggle="modal" data-target="#loginModal" ><b style="font-weight: 500; padding-right: 20px;"><?php echo e(__('LOG IN')); ?></b></a>
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
                    <a class="nav-item nav-link customNavLink text-blue hideOnSm" href="#" data-toggle="modal" data-target="#talkToSales"><b style="font-weight: 500;">TALK TO SALES</b></a>
                <? if(!$isClient): ?>
                <li class="nav-link registerBtn NoDecor">
                    <a href="/client/register/"
                       data-toggle="modal"
                       data-target="#exampleModalCenter"><?php echo e(__('BECOME OUR CLIENT')); ?></a>
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
    <main class="py-4" style="padding-bottom:0 !important; background: white;">
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
