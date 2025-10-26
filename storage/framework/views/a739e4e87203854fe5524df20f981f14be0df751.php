<div class="login-section w-100">
    <?php echo $__env->make('auth.login-form',['mode'=>'ajax'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('auth.social-login-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<div class="register-section w-100 d-none">
    <?php echo $__env->make('auth.register-form',['mode'=>'ajax'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('auth.social-login-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<div class="forgot-section w-100 d-none">
    <?php echo $__env->make('auth.passwords.email-form',['mode'=>'ajax'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/auth/modal-forms.blade.php ENDPATH**/ ?>