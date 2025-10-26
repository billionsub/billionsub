<form method="POST" action="<?php echo e(route('login')); ?>">
    <?php echo csrf_field(); ?>
    <?php if(getSetting('social-login.facebook_client_id') || getSetting('social-login.twitter_client_id') || getSetting('social-login.google_client_id')): ?>
        <div class="my-1">
            <p class="mb-0">
                <?php echo e(__("Don't have an account?")); ?>

                <?php if(isset($mode) && $mode == 'ajax'): ?>
                    <a href="javascript:void(0);" onclick="LoginModal.changeActiveTab('register')" class="text-primary text-gradient font-weight-bold"><?php echo e(__('Sign up')); ?></a>
                <?php else: ?>
                    <a href="<?php echo e(route('register')); ?>" class="text-primary text-gradient font-weight-bold"><?php echo e(__('Sign up')); ?></a>
                <?php endif; ?>
            </p>
        </div>
    <?php endif; ?>
    <div class="form-group ">
        <label for="email" class="col-form-label"><?php echo e(__('E-Mail Address')); ?></label>
        <div class="">
            <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  name="email" value="<?php echo e(old('email')); ?>" autocomplete="email" autofocus>
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

    <div class="form-group">
        <label for="password" class="col-form-label"><?php echo e(__('Password')); ?></label>
        <div class="">
            <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  name="password" autocomplete="current-password">
            <?php $__errorArgs = ['password'];
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

    <div class="loginHelpers form-group d-flex flex-row-reverse">
        <?php if(Route::has('password.request')): ?>
            <div class="pull-right">
                <?php if(isset($mode) && $mode == 'ajax'): ?>
                    <a href="javascript:void(0);" onclick="LoginModal.changeActiveTab('forgot')" class="" id="forgotPass-label"><?php echo e(__('Forgot Your Password?')); ?></a>
                <?php else: ?>
                    <a href="<?php echo e(route('password.request')); ?>" class="" id="forgotPass-label"><?php echo e(__('Forgot Your Password?')); ?></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="clearfix"></div>
    <div class="form-group row mb-0 mt-4">
        <div class="col">
            <button type="submit" class="btn btn-grow btn-lg btn-primary bg-gradient-primary btn-block">
                <?php echo e(__('Login')); ?>

            </button>
        </div>
    </div>

</form>

<?php if(!getSetting('social-login.facebook_client_id') && !getSetting('social-login.twitter_client_id') && !getSetting('social-login.google_client_id')): ?>
    <hr>
    <div class=" text-center py-2">
        <p class="">
            <?php echo e(__("Don't have an account?")); ?>

            <?php if(isset($mode) && $mode == 'ajax'): ?>
                <a href="javascript:void(0);" onclick="LoginModal.changeActiveTab('register')" class="text-primary text-gradient font-weight-bold"><?php echo e(__('Sign up')); ?></a>
            <?php else: ?>
                <a href="<?php echo e(route('register')); ?>" class="text-primary text-gradient font-weight-bold"><?php echo e(__('Sign up')); ?></a>
            <?php endif; ?>
        </p>
    </div>
<?php endif; ?>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/public_html/resources/views/auth/login-form.blade.php ENDPATH**/ ?>