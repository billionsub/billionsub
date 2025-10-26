<form method="POST" action="<?php echo e(route('password.email')); ?>">
    <?php echo csrf_field(); ?>
    <div class="form-group ">
        <label for="email" class=" col-form-label "><?php echo e(__('E-Mail Address')); ?></label>
        <div class="">
            <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" autocomplete="email" autofocus>
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($message); ?></strong>
            </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>
    <div class="form-group row mb-0">
        <div class="col">
            <button type="submit" class="btn btn-grow btn-lg btn-primary bg-gradient-primary btn-block">
                <?php echo e(__('Send Password Reset Link')); ?>

            </button>
        </div>
    </div>
</form>
<hr>
<div class=" text-center">
    <p class="mb-4">
        <?php echo e(__("Don't have an account?")); ?>

        <?php if(isset($mode) && $mode == 'ajax'): ?>
            <a href="javascript:void(0);" onclick="LoginModal.changeActiveTab('register')" class="text-primary text-gradient font-weight-bold"><?php echo e(__('Sign up')); ?></a>
        <?php else: ?>
            <a href="<?php echo e(route('register')); ?>" class="text-primary text-gradient font-weight-bold"><?php echo e(__('Sign up')); ?></a>
        <?php endif; ?>
    </p>
</div>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/auth/passwords/email-form.blade.php ENDPATH**/ ?>