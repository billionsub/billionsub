<!doctype html>
<html class="h-100" dir="<?php echo e(GenericHelper::getSiteDirection()); ?>" lang="<?php echo e(session('locale')); ?>">
<head>
    <?php echo $__env->make('template.head',['additionalCss' => [
                '/libs/animate.css/animate.css',
                '/libs/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css',
                '/css/side-menu.css',
             ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body class="d-flex flex-column">
<?php echo $__env->make('elements.impersonation-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('elements.global-announcement', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="flex-fill">
    <?php echo $__env->make('template.user-side-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container-xl overflow-x-hidden-m">
        <div class="row main-wrapper">
            <div class="col-2 col-md-3 pt-4 p-0 d-none d-md-block">
                <?php echo $__env->make('template.side-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-12 col-md-9 <?php echo e((!in_array(Route::currentRouteName(),['my.messenger.get']) ? 'min-vh-100' : '' )); ?>  border-left px-0 overflow-x-hidden-m content-wrapper <?php echo e((in_array(Route::currentRouteName(),['feed','profile','my.messenger.get','search.get','my.notifications','my.bookmarks','my.lists.all','my.lists.show','my.settings','posts.get']) ? '' : 'border-right' )); ?>">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
        <div class="d-block d-md-none fixed-bottom">
            <?php echo $__env->make('elements.mobile-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

</div>
<?php if(getSetting('compliance.enable_age_verification_dialog')): ?>
    <?php echo $__env->make('elements.site-entry-approval-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php echo $__env->make('template.footer-compact',['compact'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('template.jsVars', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('template.jsAssets',['additionalJs' => [
               '/libs/jquery-backstretch/jquery.backstretch.min.js',
               '/libs/wow.js/dist/wow.min.js',
               '/libs/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js',
               '/js/SideMenu.js'
]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('elements.language-selector-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/layouts/user-no-nav.blade.php ENDPATH**/ ?>