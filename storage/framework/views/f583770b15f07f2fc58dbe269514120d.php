

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Dashboards'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Dashboards
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Dashboard
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eligendi corrupti iste laborum similique ipsam quas quidem
        impedit explicabo quam, vel quasi quis et expedita assumenda maxime asperiores perferendis ipsum natus?</p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/isuru/Documents/Projects/eltracmo/resources/views/index.blade.php ENDPATH**/ ?>