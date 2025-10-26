
<?php echo Minify::javascript(
        array_merge([
        '/libs/jquery/dist/jquery.min.js',
        '/libs/popper.js/dist/umd/popper.min.js',
        '/libs/bootstrap/dist/js/bootstrap.min.js',
        '/js/plugins/toasts.js',
        '/libs/cookieconsent/build/cookieconsent.min.js',
        '/libs/xss/dist/xss.min.js',
        '/js/app.js',
    ],
    (isset($additionalJs) ? $additionalJs : [])
    ))->withFullUrl(); ?>







<?php echo $__env->yieldContent('scripts'); ?>

<script type="module" src="<?php echo e(asset('/libs/ionicons/dist/ionicons/ionicons.esm.js')); ?>"></script>
<script nomodule src="<?php echo e(asset('/libs/ionicons/dist/ionicons/ionicons.js')); ?>"></script>

<?php if(getSetting('custom-code-ads.custom_js')): ?>
    <?php echo getSetting('custom-code-ads.custom_js'); ?>

<?php endif; ?>

<?php echo $__env->make('elements.translations', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/public_html/resources/views/template/jsAssets.blade.php ENDPATH**/ ?>