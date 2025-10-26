<?php $__env->startSection('page_title', __('Notifications')); ?>

<?php $__env->startSection('styles'); ?>
    <?php echo Minify::stylesheet([
            '/css/pages/notifications.css'
         ])->withFullUrl(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo Minify::javascript([
            '/js/pages/notifications.js'
         ])->withFullUrl(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12 pr-0 min-vh-100 pt-4 border-right">
            <div class="px-3 pb-4 border-bottom">
                <h5 class="text-truncate text-bold mb-0 <?php echo e((Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme') == 'dark' ? '' : 'text-dark-r') : (Cookie::get('app_theme') == 'dark' ? '' : 'text-dark-r'))); ?>"><?php echo e(__('Notifications')); ?></h5>
            </div>
            <div class="mt-3 inline-border-tabs">
                <?php echo $__env->make('elements.notifications.notifications-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <?php echo $__env->make('elements.notifications.notifications-wrapper', ['notifications' => $notifications], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user-no-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/pages/notifications.blade.php ENDPATH**/ ?>