<!doctype html>
<html class="h-100" dir="<?php echo e(GenericHelper::getSiteDirection()); ?>" lang="<?php echo e(session('locale')); ?>">
<head>
    <meta charset="utf-8">
    
    <title><?php echo $__env->yieldContent('page_title'); ?> - <?php echo e(config('app.site.name')); ?> </title>
    
    <meta name="description" content="<?php echo e(__("Install the script")); ?>}">
    
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo $__env->yieldContent('meta'); ?>
    
    <link rel="shortcut icon" href="<?php echo e(asset(config('app.site.favicon'))); ?>" type="image/x-icon">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300" rel="preload" as="style">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,500,600,700" rel="preload" as="style">
    
    <?php echo Minify::stylesheet(
            [
                '/libs/cookieconsent/build/cookieconsent.min.css',
                '/css/theme/bootstrap.css',
                '/css/app.css',
             ]
             )->withFullUrl(); ?>

    
    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body class="d-flex flex-column">

<div class="flex-fill">
    <?php echo $__env->yieldContent('content'); ?>
</div>


<?php echo Minify::javascript(
        [
        '/libs/jquery/dist/jquery.min.js',
        '/libs/popper.js/dist/umd/popper.min.js',
        '/libs/bootstrap/dist/js/bootstrap.min.js',
        '/js/plugins/toasts.js',
        '/libs/cookieconsent/build/cookieconsent.min.js',
        '/js/Installer.js',
        '/js/app.js',
        ]
    )->withFullUrl(); ?>



<?php echo $__env->yieldContent('scripts'); ?>

<script type="module" src="<?php echo e(asset('/libs/ionicons/dist/ionicons/ionicons.esm.js')); ?>"></script>
<script nomodule src="<?php echo e(asset('/libs/ionicons/dist/ionicons/ionicons.js')); ?>"></script>

<?php echo $__env->make('elements.translations', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/layouts/install.blade.php ENDPATH**/ ?>