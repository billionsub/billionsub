<?php $__env->startSection('page_title', __('Login')); ?>

<?php $__env->startSection('page_description', getSetting('site.description')); ?>
<?php $__env->startSection('share_url', route('home')); ?>
<?php $__env->startSection('share_title', getSetting('site.name') . ' - ' .  __('Login')); ?>
<?php $__env->startSection('share_description', getSetting('site.description')); ?>
<?php $__env->startSection('share_type', 'article'); ?>
<?php $__env->startSection('share_img', GenericHelper::getOGMetaImage()); ?>

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
                                <?php echo $__env->make('auth.login-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo $__env->make('auth.social-login-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('auth.login-background', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.no-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/auth/login.blade.php ENDPATH**/ ?>