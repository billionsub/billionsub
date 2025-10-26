<?php if(!Auth::user()->email_verified_at): ?> <?php echo $__env->make('elements.resend-verification-email-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php endif; ?>

<form method="POST" action="<?php echo e(route('my.settings.account.save')); ?>">
    <?php echo csrf_field(); ?>
    <?php if(session('success')): ?>
        <div class="alert alert-success text-white font-weight-bold mt-2" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="<?php echo e(__('Close')); ?>">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <label for="username"><?php echo e(__('Password')); ?></label>
        <input class="form-control <?php echo e($errors->has('password') ? 'is-invalid' : ''); ?>" id="username" name="password" type="password">
        <?php if($errors->has('password')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('password')); ?></strong>
            </span>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="username"><?php echo e(__('New password')); ?></label>
        <input class="form-control <?php echo e($errors->has('new_password') ? 'is-invalid' : ''); ?>" id="username" name="new_password" type="password">
        <?php if($errors->has('new_password')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('new_password')); ?></strong>
            </span>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="username"><?php echo e(__('Confirm password')); ?></label>
        <input class="form-control <?php echo e($errors->has('confirm_password') ? 'is-invalid' : ''); ?>" id="username" name="confirm_password" type="password">
        <?php if($errors->has('confirm_password')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('confirm_password')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
    <button class="btn btn-primary btn-block rounded mr-0" type="submit"><?php echo e(__('Save')); ?></button>

</form>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/settings/settings-account.blade.php ENDPATH**/ ?>