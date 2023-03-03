

<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Preloader'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

<body data-topbar="dark" data-layout="horizontal">
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner-chase">
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
    <?php $__env->slot('li_1'); ?> Layouts <?php $__env->endSlot(); ?>
    <?php $__env->slot('title'); ?> Preloader <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>


    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master-layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/isuru/Documents/Projects/eltracmo/resources/views/layouts-hori-preloader.blade.php ENDPATH**/ ?>