<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>" dir="<?php echo e(__('voyager::generic.is_rtl') == 'true' ? 'rtl' : 'ltr'); ?>">
<head>
    <?php if (! empty(trim($__env->yieldContent('page_title')))): ?>
        <title><?php echo $__env->yieldContent('page_title'); ?> | <?php echo e(setting('admin.title')); ?> </title>
    <?php else: ?>
        <title><?php echo e(setting('admin.title') . " - " . setting('admin.description')); ?></title>
    <?php endif; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>
    <meta name="assets-path" content="<?php echo e(route('voyager.voyager_assets')); ?>"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('/libs/@simonwep/pickr/dist/themes/nano.min.css')); ?>">

    <!-- Favicon -->
    <?php $admin_favicon = Voyager::setting('admin.icon_image', ''); ?>
    <?php if($admin_favicon == ''): ?>
        <link rel="shortcut icon" href="<?php echo e(getSetting('admin.icon_image')); ?>" type="image/x-icon">
    <?php else: ?>
        <link rel="shortcut icon" href="<?php echo e(Voyager::image($admin_favicon)); ?>" type="image/png">
    <?php endif; ?>

    <!-- App CSS -->
    <link rel="stylesheet" href="<?php echo e(voyager_asset('css/app.css')); ?>">

    <?php echo $__env->yieldContent('css'); ?>
    <?php if(__('voyager::generic.is_rtl') == 'true'): ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css">
        <link rel="stylesheet" href="<?php echo e(voyager_asset('css/rtl.css')); ?>">
    <?php endif; ?>

    <!-- Few Dynamic Styles -->
    <style type="text/css">
        .voyager .side-menu .navbar-header {
            background:<?php echo e(config('voyager.primary_color','#22A7F0')); ?>;
            border-color:<?php echo e(config('voyager.primary_color','#22A7F0')); ?>;
        }
        .widget .btn-primary{
            border-color:<?php echo e(config('voyager.primary_color','#22A7F0')); ?>;
        }
        .widget .btn-primary:focus, .widget .btn-primary:hover, .widget .btn-primary:active, .widget .btn-primary.active, .widget .btn-primary:active:focus{
            background:<?php echo e(config('voyager.primary_color','#22A7F0')); ?>;
        }
        .voyager .breadcrumb a{
            color:<?php echo e(config('voyager.primary_color','#22A7F0')); ?>;
        }
    </style>

    <?php if(!empty(config('voyager.additional_css'))): ?><!-- Additional CSS -->
        <?php $__currentLoopData = config('voyager.additional_css'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $css): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><link rel="stylesheet" type="text/css" href="<?php echo e(asset($css)); ?>"><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <?php echo $__env->yieldContent('head'); ?>
</head>

<body class="voyager <?php if(isset($dataType) && isset($dataType->slug)): ?><?php echo e($dataType->slug); ?><?php endif; ?>">

<?php if(\App\Providers\InstallerServiceProvider::hasAvailableMigrations()): ?>
    <?php echo $__env->make('elements.admin.incomplete-update-dialog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<div id="voyager-loader">
    <?php $admin_loader_img = Voyager::setting('admin.loader', ''); ?>
    <?php if($admin_loader_img == ''): ?>
        <img src="<?php echo e(asset('/img/admin-loader.svg')); ?>" alt="Voyager Loader">
    <?php else: ?>
        <img src="<?php echo e(Voyager::image($admin_loader_img)); ?>" alt="Voyager Loader">
    <?php endif; ?>
</div>

<?php
if (\Illuminate\Support\Str::startsWith(Auth::user()->avatar, 'http://') || \Illuminate\Support\Str::startsWith(Auth::user()->avatar, 'https://')) {
    $user_avatar = Auth::user()->avatar;
} else {
    $user_avatar = Voyager::image(Auth::user()->avatar);
}
?>

<div class="app-container">
    <div class="fadetoblack visible-xs"></div>
    <div class="row content-container">
        <?php echo $__env->make('voyager::dashboard.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('voyager::dashboard.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Main Content -->
        <div class="container-fluid">
            <div class="side-body padding-top">
                <?php echo $__env->yieldContent('page_header'); ?>
                <div id="voyager-notifications"></div>
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('voyager::partials.app-footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Javascript Libs -->


<script type="text/javascript" src="<?php echo e(voyager_asset('js/app.js')); ?>"></script>

<script>
    <?php if(Session::has('alerts')): ?>
        let alerts = <?php echo json_encode(Session::get('alerts')); ?>;
        helpers.displayAlerts(alerts, toastr);
    <?php endif; ?>

    <?php if(Session::has('message')): ?>

    var alertType = <?php echo json_encode(Session::get('alert-type', 'info')); ?>;
    var alertMessage = <?php echo json_encode(Session::get('message')); ?>;
    var alerter = toastr[alertType];


    if (alerter) {
        alerter(alertMessage);
    } else {
        toastr.error("toastr alert-type " + alertType + " is unknown");
    }
    <?php endif; ?>
    var appUrl = "<?php echo e(url('')); ?>";

    <?php if(\App\Providers\InstallerServiceProvider::hasAvailableMigrations()): ?>
    $(document).ready(function(){
        $('#globalModal').modal('show');
    });
    <?php endif; ?>

</script>
<?php echo $__env->make('voyager::media.manager', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('javascript'); ?>
<?php echo $__env->yieldPushContent('javascript'); ?>
<?php if(!empty(config('voyager.additional_js'))): ?><!-- Additional Javascript -->
    <?php $__currentLoopData = config('voyager.additional_js'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $js): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><script type="text/javascript" src="<?php echo e(asset($js)); ?>"></script><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

</body>
</html>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/vendor/voyager/master.blade.php ENDPATH**/ ?>