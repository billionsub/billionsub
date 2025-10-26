<form method="POST" action="<?php echo e(route('register')); ?>" id="register-form">
    <?php echo csrf_field(); ?>

    <?php if(getSetting('social-login.facebook_client_id') || getSetting('social-login.twitter_client_id') || getSetting('social-login.google_client_id')): ?>
        <div class="my-1">
            <p class="mb-0">
                <?php echo e(__('Already got an account?')); ?>

                <?php if(isset($mode) && $mode == 'ajax'): ?>
                    <a href="javascript:void(0);" onclick="LoginModal.changeActiveTab('login')" class="text-primary text-gradient font-weight-bold"><?php echo e(__('Sign in')); ?></a>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="text-primary text-gradient font-weight-bold"><?php echo e(__('Sign in')); ?></a>
                <?php endif; ?>
            </p>
        </div>
    <?php endif; ?>

    <div class="form-group ">
        <label for="name" class="col-form-label"><?php echo e(__('Name')); ?></label>
        <div class="">
            <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>"  autocomplete="name" autofocus>
            <?php $__errorArgs = ['name'];
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
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">
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

    <div class="form-group ">
        <label for="password" class=" col-form-label "><?php echo e(__('Password')); ?></label>
        <div class="">
            <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required name="password" autocomplete="new-password">

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

    <div class="form-group ">
        <label for="password-confirm" class=" col-form-label "><?php echo e(__('Confirm Password')); ?></label>

        <div class="">
            <input id="password-confirm" type="password" class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required name="password_confirmation" autocomplete="new-password">
            <?php $__errorArgs = ['password_confirmation'];
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
        <div class="custom-control custom-checkbox">
            <div class="">
                <input class="custom-control-input <?php $__errorArgs = ['terms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="tosAgree" type="checkbox" name="terms" value="1" placeholder="<?php echo e(__('Terms and Conditions')); ?>">
                <label class="custom-control-label" for="tosAgree">
                    <span><?php echo e(__('I agree to the')); ?> <a href="<?php echo e(route('pages.get',['slug'=>GenericHelper::getTOSPage()->slug])); ?>"><?php echo e(__('Terms of Use')); ?></a> <?php echo e(__('and')); ?> <a href="<?php echo e(route('pages.get',['slug'=>GenericHelper::getPrivacyPage()->slug])); ?>"><?php echo e(__('Privacy Policy')); ?></a>.</span>
                </label>
            </div>
        </div>
    </div>

    <?php if(getSetting('security.recaptcha_enabled') && !Auth::check()): ?>
        <div class="form-group row d-flex justify-content-center captcha-field">
            <?php echo NoCaptcha::display(['data-theme' => (Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme')) : Cookie::get('app_theme') )]); ?>

            <?php $__errorArgs = ['g-recaptcha-response'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="text-danger" role="alert">
                <strong><?php echo e(__("Please check the captcha field.")); ?></strong>
            </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    <?php endif; ?>

    <div class="form-group row mb-0">
        <div class="col">
            <button type="submit" class="btn btn-grow btn-lg btn-primary bg-gradient-primary btn-block">
                <?php echo e(__('Register')); ?>

            </button>
        </div>
    </div>

</form>
<?php if(!getSetting('social-login.facebook_client_id') && !getSetting('social-login.twitter_client_id') && !getSetting('social-login.google_client_id')): ?>
    <hr>
    <div class=" text-center">
        <p class="mb-4">
            <?php echo e(__('Already got an account?')); ?>

            <?php if(isset($mode) && $mode == 'ajax'): ?>
                <a href="javascript:void(0);" onclick="LoginModal.changeActiveTab('login')" class="text-primary text-gradient font-weight-bold"><?php echo e(__('Sign in')); ?></a>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="text-primary text-gradient font-weight-bold"><?php echo e(__('Sign in')); ?></a>
            <?php endif; ?>
        </p>
    </div>
<?php endif; ?>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/public_html/resources/views/auth/register-form.blade.php ENDPATH**/ ?>