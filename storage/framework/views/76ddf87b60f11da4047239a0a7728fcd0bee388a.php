<?php if(getSetting('site.login_page_background_image')): ?>
    <div class="col-md-6 d-none d-md-flex bg-image p-0 m-0">
        <div class="d-flex m-0 p-0  w-100 h-100 bg-image" style="background-image: url('<?php echo e(getSetting('site.login_page_background_image')); ?>');">
        </div>
    </div>
<?php else: ?>
    <div class="col-md-6 d-none d-md-flex bg-image p-0 m-0">
        <div class="d-flex m-0 p-0 bg-gradient-primary w-100 h-100">
            <img src="<?php echo e(asset('/img/pattern-lines.svg')); ?>" alt="pattern-lines" class="img-fluid opacity-10">
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/public_html/resources/views/auth/login-background.blade.php ENDPATH**/ ?>