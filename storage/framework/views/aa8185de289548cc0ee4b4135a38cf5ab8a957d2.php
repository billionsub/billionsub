<!doctype html>
<html class="h-100" dir="<?php echo e(GenericHelper::getSiteDirection()); ?>" lang="<?php echo e(session('locale')); ?>">
<head>
    <?php echo $__env->make('template.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body class="d-flex flex-column">
<?php echo $__env->make('elements.impersonation-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('elements.global-announcement', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('template.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="flex-fill">
    <?php echo $__env->yieldContent('content'); ?>
</div>
<?php if(getSetting('compliance.enable_age_verification_dialog')): ?>
    <?php echo $__env->make('elements.site-entry-approval-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php echo $__env->make('template.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('template.jsVars', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('template.jsAssets', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('elements.language-selector-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/public_html/resources/views/layouts/generic.blade.php ENDPATH**/ ?>