<div class="d-flex justify-content-between">
    <div>
        <?php if($type == 'generic'): ?>
            <div class="mt-3 ml-3">
                <h5 class="text-bold <?php echo e((Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme') == 'dark' ? '' : 'text-dark-r') : (Cookie::get('app_theme') == 'dark' ? '' : 'text-dark-r'))); ?>"><?php echo e(__('Settings')); ?></h5>
                <h6 class="mt-2 text-muted"><?php echo e(__('Manage your account')); ?></h6>
            </div>
        <?php else: ?>
            <div class="ml-3">
                <h5 class="text-bold mt-0 mt-md-3 mb-0 <?php echo e((Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme') == 'dark' ? '' : 'text-dark-r') : (Cookie::get('app_theme') == 'dark' ? '' : 'text-dark-r'))); ?>"><?php echo e(ucfirst(__($activeSettingsTab))); ?></h5>
                <h6 class="mt-2 text-muted"><?php echo e(__($currentSettingTab['heading'])); ?></h6>
            </div>
        <?php endif; ?>
    </div>
    <div class="d-flex align-content-center pt-2">
        <div class="w-40 navbar-toggler d-lg-none mr-4 h-pill h-pill-primary rounded d-flex justify-content-center align-items-center " data-toggle="collapse" data-target="#settingsNav" aria-controls="settingsNav" aria-expanded="false" aria-label="Toggle navigation">
            <?php echo $__env->make('elements.icon',['icon'=>'options-outline','variant'=>'medium','centered'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/public_html/resources/views/elements/settings/settings-header.blade.php ENDPATH**/ ?>