<?php $__env->startSection('page_title',  ucfirst(__($activeSettingsTab))); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo Minify::javascript(
            array_merge($additionalAssets['js'],[
                '/js/pages/settings/settings.js',
                '/js/suggestions.js',
         ])
        )->withFullUrl(); ?>

    <?php if(getSetting('profiles.allow_profile_bio_markdown')): ?>
        <script src="<?php echo e(asset('/libs/easymde/dist/easymde.min.js')); ?>"></script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <?php echo Minify::stylesheet(
            array_merge($additionalAssets['css'],[
                '/css/pages/settings.css',
                ])
         )->withFullUrl(); ?>

    <style>
        .selectize-control.multi .selectize-input>div.active {
            background:#<?php echo e(getSetting('colors.theme_color_code')); ?>;
        }
    </style>
    <?php if(getSetting('profiles.allow_profile_bio_markdown')): ?>
        <link href="<?php echo e(asset('/libs/easymde/dist/easymde.min.css')); ?>" rel="stylesheet">
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3 mb-3 pr-0 settings-menu">

                <div class="settings-menu-wrapper">

                    <div class="d-none d-md-block">
                        <?php echo $__env->make('elements.settings.settings-header',['type'=>'generic'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="d-block d-md-none mt-3">
                        <?php echo $__env->make('elements.settings.settings-header',['type'=>'settingTab'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <hr class="mb-0">
                    <div class="">
                        <?php echo $__env->make('elements.settings.settings-menu',['availableSettings' => $availableSettings], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-lg-9 mb-5 mb-lg-0 min-vh-100 border-left border-right settings-content mt-1 mt-md-0 pl-md-0 pr-md-0">
                <div class="ml-3 d-none d-md-flex justify-content-between">
                    <div>
                        <h5 class="text-bold mt-0 mt-md-3 mb-0 <?php echo e((Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme') == 'dark' ? '' : 'text-dark-r') : (Cookie::get('app_theme') == 'dark' ? '' : 'text-dark-r'))); ?>"><?php echo e(ucfirst(__($activeSettingsTab))); ?></h5>
                        <h6 class="mt-2 text-muted"><?php echo e(__($currentSettingTab['heading'])); ?></h6>
                    </div>
                </div>
                <hr class="<?php echo e(in_array($activeSettingsTab, ['subscriptions','payments']) ? 'mb-0' : ''); ?> d-none d-md-block mt-2">
                <div class="<?php echo e(in_array($activeSettingsTab, ['subscriptions','payments', 'referrals']) ? '' : 'px-4 px-md-3'); ?>">
                    <?php echo $__env->make('elements.settings.settings-'.$activeSettingsTab, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user-no-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/pages/settings.blade.php ENDPATH**/ ?>