<?php if(getSetting('site.allow_theme_switch')): ?>
    <span class="text-link pointer-cursor nav-link d-flex justify-content-between dark-mode-switcher">
        <div class="d-flex justify-content-center align-items-center">
            <div class="icon-wrapper d-flex justify-content-center align-items-center">
                <?php if(Cookie::get('app_theme') == 'dark' || (!Cookie::get('app_theme') && getSetting('site.default_user_theme') == 'dark')): ?>
                    <?php echo $__env->make('elements.icon',['icon'=>'contrast-outline','variant'=>'small','centered'=>false,'classes'=>'mr-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php else: ?>
                    <?php echo $__env->make('elements.icon',['icon'=>'contrast','variant'=>'small','centered'=>false,'classes'=>'mr-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
            <span class="d-block text-truncate side-menu-label ml-1">
                                        <?php if(Cookie::get('app_theme') == 'dark' || (!Cookie::get('app_theme') && getSetting('site.default_user_theme') == 'dark') ): ?>
                    <?php echo e(__('Light')); ?>

                <?php else: ?>
                    <?php echo e(__('Dark')); ?>

                <?php endif; ?>
                            </span>
        </div>
    </span>
<?php endif; ?>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/public_html/resources/views/elements/footer/dark-mode-switcher.blade.php ENDPATH**/ ?>