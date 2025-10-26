<?php if(getSetting('social-login.facebook_client_id') || getSetting('social-login.twitter_client_id') || getSetting('social-login.google_client_id')): ?>
    <div class="social-login-links">

        <div class="strike mt-2">
            <span><?php echo e(__("Or use social")); ?></span>
        </div>

        <div class="mt-4">
            <?php if(getSetting('social-login.facebook_client_id')): ?>
                <div class="d-flex justify-content-center">
                    <a href="<?php echo e(url('',['socialAuth','facebook'])); ?>" rel="nofollow" class="btn btn-block btn-outline-primary btn-round">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="col-4 d-flex flex-row-reverse pr-0">
                                <img src="<?php echo e(asset('/img/logos/facebook-logo.svg')); ?>" class="social-media-icon"/>
                            </div>
                            <div class="col-8 d-flex align-items-center flex-row ">
                                <?php echo e(__("Sign in with")); ?> <?php echo e(__("Facebook")); ?>

                            </div>
                        </div>
                    </a>
                </div>
            <?php endif; ?>

            <?php if(getSetting('social-login.twitter_client_id')): ?>
                <div class="d-flex justify-content-center">
                    <a href="<?php echo e(url('',['socialAuth','twitter'])); ?>" rel="nofollow" class="btn btn-block btn-outline-primary btn-round">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="col-4 d-flex flex-row-reverse pr-0">
                                <img src="<?php echo e(asset('/img/logos/twitter-logo.svg')); ?>" class="social-media-icon"/>
                            </div>
                            <div class="col-8 d-flex align-items-center flex-row ">
                                <?php echo e(__("Sign in with")); ?> <?php echo e(__("Twitter")); ?>

                            </div>
                        </div>
                    </a>
                </div>
            <?php endif; ?>

            <?php if(getSetting('social-login.google_client_id')): ?>
                <div class="d-flex justify-content-center">
                    <a href="<?php echo e(url('',['socialAuth','google'])); ?>" rel="nofollow" class="btn btn-block btn-outline-primary btn-round">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="col-4 d-flex flex-row-reverse pr-0">
                                <img src="<?php echo e(asset('/img/logos/google-logo.svg')); ?>" class="social-media-icon"/>
                            </div>
                            <div class="col-8 d-flex align-items-center flex-row ">
                                <?php echo e(__("Sign in with")); ?> <?php echo e(__("Google")); ?>

                            </div>
                        </div>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php endif; ?>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/auth/social-login-box.blade.php ENDPATH**/ ?>