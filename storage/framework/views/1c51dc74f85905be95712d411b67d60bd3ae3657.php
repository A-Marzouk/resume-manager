<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>123 Workforce</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <?php echo $__env->make('layouts.includes.styles', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body id="dashboard" class="dashboard">

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('layouts.includes.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>
