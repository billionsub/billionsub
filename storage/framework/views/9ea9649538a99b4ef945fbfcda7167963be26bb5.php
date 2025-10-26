<?php $__env->startSection('meta'); ?>
    <meta name="robots" content="noindex">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_title', __('Reset Password')); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row no-gutter">
        <div class="col-md-6">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-xl-6 mx-auto">
                            <a href="<?php echo e(action('HomeController@index')); ?>">
                                <img class="brand-logo pb-4" src="<?php echo e(asset( (Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme') == 'dark' ? getSetting('site.dark_logo') : getSetting('site.light_logo')) : (Cookie::get('app_theme') == 'dark' ? getSetting('site.dark_logo') : getSetting('site.light_logo'))) )); ?>">
                            </a>
                            <?php if(session('status')): ?>
                                <div class="alert alert-success text-white" role="alert">
                                    <?php echo e(session('status')); ?>

                                </div>
                            <?php endif; ?>
                            <?php echo $__env->make('auth.passwords.email-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-none d-md-flex bg-image p-0 m-0">
            <div class="d-flex m-0 p-0 bg-gradient-primary w-100 h-100">
                <img src="<?php echo e(asset('/img/pattern-lines.svg')); ?>" alt="pattern-lines" class="img-fluid opacity-6">
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.no-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>