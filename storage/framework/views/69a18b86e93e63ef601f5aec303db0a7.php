

<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Scrollable'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <body data-topbar="dark" data-layout="horizontal" data-layout-scrollable="true">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Layouts <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Scrollable <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
        

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master-layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Tarun\Laravel Admins\Skote_Laravel\starterkit\resources\views/layouts-hori-scrollable.blade.php ENDPATH**/ ?>