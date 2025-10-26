<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>" dir="<?php echo e(__('voyager::generic.is_rtl') == 'true' ? 'rtl' : 'ltr'); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="none" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="admin login">
    <title><?php echo $__env->yieldContent('title', 'Admin - '.Voyager::setting("admin.title")); ?></title>
    <link rel="stylesheet" href="<?php echo e(voyager_asset('css/app.css')); ?>">
    <?php if(__('voyager::generic.is_rtl') == 'true'): ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css">
        <link rel="stylesheet" href="<?php echo e(voyager_asset('css/rtl.css')); ?>">
    <?php endif; ?>
    <style>
        body {
            background-image:url('<?php echo e(str_replace('\\','/',urldecode(Voyager::image(Voyager::setting("admin.bg_image"), Storage::disk('public')->url('../img/admin-bg.png'))))); ?>');
            background-color: <?php echo e(Voyager::setting("admin.bg_color", "#FFFFFF" )); ?>;
        }
        body.login .login-sidebar {
            border-top:5px solid <?php echo e(config('voyager.primary_color','#22A7F0')); ?>;
        }
        @media (max-width: 767px) {
            body.login .login-sidebar {
                border-top:0px !important;
                border-left:5px solid <?php echo e(config('voyager.primary_color','#22A7F0')); ?>;
            }
        }
        body.login .form-group-default.focused{
            border-color:<?php echo e(config('voyager.primary_color','#22A7F0')); ?>;
        }
        .login-button, .bar:before, .bar:after{
            background:<?php echo e(config('voyager.primary_color','#22A7F0')); ?>;
        }

    </style>

    <?php if(!empty(config('voyager.additional_css'))): ?><!-- Additional CSS -->
        <?php $__currentLoopData = config('voyager.additional_css'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $css): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><link rel="stylesheet" type="text/css" href="<?php echo e(asset($css)); ?>"><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <?php echo $__env->yieldContent('pre_css'); ?>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <!-- Favicon -->
    <?php $admin_favicon = Voyager::setting('admin.icon_image', ''); ?>
    <?php if($admin_favicon == ''): ?>
        <link rel="shortcut icon" href="<?php echo e(Storage::disk('public')->url('../img/rounded-logo-white.svg')); ?>" type="image/x-icon">
    <?php else: ?>
        <link rel="shortcut icon" href="<?php echo e(Voyager::image($admin_favicon)); ?>" type="image/png">
    <?php endif; ?>

</head>
<body class="login">
<div class="container-fluid">
    <div class="row">
        <div class="hidden-xs col-sm-6 col-md-8 min-vh-100 p-0 mb-0">
            <div class="faded-bg animated"></div>
            <?php $admin_bg = Voyager::setting('admin.bg_image', ''); ?>
            <?php if($admin_bg == ''): ?>
                <div class="d-flex m-0 p-0 bg-gradient-primary min-vh-100 p-0">
                    <img src="<?php echo e(asset('img/pattern-lines.svg')); ?>" alt="pattern-lines" class="img-fluid opacity-10 min-vh-100">
                </div>
            <?php endif; ?>
            <div class="clearfix">
                <div class="col-sm-12 col-md-10 col-md-offset-2">
                    <div class="logo-title-container">
                        <?php $admin_logo_img = Voyager::setting('admin.icon_image', ''); ?>
                        <?php if($admin_logo_img == ''): ?>
                            <img class="img-responsive pull-left flip logo hidden-xs animated fadeIn" src="<?php echo e(Storage::disk('public')->url('../img/rounded-logo-gradient.svg')); ?>" alt="Logo Icon">
                        <?php else: ?>
                            <img class="img-responsive pull-left flip logo hidden-xs animated fadeIn" src="<?php echo e(Voyager::image($admin_logo_img)); ?>" alt="Logo Icon">
                        <?php endif; ?>
                        <div class="copy animated fadeIn">
                            <h1><?php echo e(Voyager::setting('admin.title', 'Voyager')); ?></h1>
                            <p><?php echo e(Voyager::setting('admin.description', __('voyager::login.welcome'))); ?></p>
                        </div>
                    </div> <!-- .logo-title-container -->
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-5 col-md-4 login-sidebar">

           <?php echo $__env->yieldContent('content'); ?>

        </div> <!-- .login-sidebar -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
<?php echo $__env->yieldContent('post_js'); ?>
</body>
</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/public_html/resources/views/vendor/voyager/auth/master.blade.php ENDPATH**/ ?>