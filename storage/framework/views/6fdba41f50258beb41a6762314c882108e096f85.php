<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title>123 Workforce</title>
        <!-- Styles -->
        <?php echo $__env->make('layouts.includes.styles', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </head>
    <body>
        <?php echo $__env->yieldContent('content'); ?>
        <script type="text/javascript" src="/js/app.js"></script>
    </body>


</html>
