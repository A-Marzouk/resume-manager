<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>123 Workforce</title>
   
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;1,700&family=Noto+Sans:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <!-- Styles -->
    <?php echo $__env->make('layouts.includes.styles', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </head>
  <body >
      <div id="newHomepage">
      <new-homepage></new-homepage>
      </div>
   
    <?php echo $__env->make('layouts.includes.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </body>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    html {
      font-size: 10px;
    }
    body {
      border-radius: 0rem;
      background: #f7f9ff !important;
      margin-top: 0 !important;

    }
    
   

   
  </style>
</html>
