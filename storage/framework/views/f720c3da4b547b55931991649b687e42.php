

<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Colored_Sidebar'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <body data-sidebar="colored">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Layouts <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Colored Sidebar <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
        

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Tarun\Laravel Admins\Skote_Laravel\starterkit\resources\views/layouts-colored-sidebar.blade.php ENDPATH**/ ?>