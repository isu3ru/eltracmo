<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8" />
    <title> <?php echo $__env->yieldContent('title'); ?> | <?php echo e(config('app.name')); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo e(URL::asset('assets/images/favicon.ico')); ?>">
    <?php echo $__env->make('layouts.head-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<?php echo $__env->yieldContent('body'); ?>

<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make('layouts.vendor-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<<<<<<<< HEAD:storage/framework/views/0afa077a196fc150e939d6ca1fd38d29.php
<?php /**PATH C:\Users\CEYTECH\Documents\Projects\isuru\eltracmo\resources\views/layouts/master-without-nav.blade.php ENDPATH**/ ?>
========
<?php /**PATH C:\projects\eltracmo\resources\views/layouts/master-without-nav.blade.php ENDPATH**/ ?>
>>>>>>>> 91269df7989fe49b0b5182f0c8a061cd5dfd648d:storage/framework/views/112238708d8bc6d8f5ad2e9e2b7d815a.php
