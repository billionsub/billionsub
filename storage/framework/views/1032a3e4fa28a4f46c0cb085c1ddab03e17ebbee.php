<?php if(getSetting('site.allow_language_switch')): ?>
    <span class="text-link pointer-cursor nav-link d-flex justify-content-between" onclick="openLanguageSelectorDialog()">
        <div class="d-flex justify-content-center align-items-center">
            <div class="icon-wrapper d-flex justify-content-center align-items-center">
                <?php echo $__env->make('elements.icon',['icon'=>'language','variant'=>'small', 'classes' => 'mr-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <span class="d-block  text-truncate side-menu-label ml-1"><?php echo e(__("Language")); ?></span>
        </div>
    </span>
<?php endif; ?>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/public_html/resources/views/elements/footer/language-switcher.blade.php ENDPATH**/ ?>