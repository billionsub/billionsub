<div class="profile-widgets-area pb-3">

    <div class="card recent-media rounded-lg">
        <div class="card-body m-0 pb-0">
        </div>
        <h5 class="card-title pl-3 mb-0"><?php echo e(__('Recent')); ?></h5>
        <div class="card-body <?php echo e($recentMedia ? 'text-center' : ''); ?>">
            <?php if($recentMedia && count($recentMedia) && Auth::check()): ?>
                <?php $__currentLoopData = $recentMedia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e($media->path); ?>" rel="mswp" class="mr-1">
                        <img src="<?php echo e(AttachmentHelper::getThumbnailPathForAttachmentByResolution($media, 150, 150)); ?>" class="rounded mb-2 mb-md-2 mb-lg-2 mb-xl-0 img-fluid">
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <p class="m-0"><?php echo e(__('Latest media not available.')); ?></p>
            <?php endif; ?>

        </div>
    </div>

    <?php if($user->paid_profile && (!getSetting('profiles.allow_users_enabling_open_profiles') || (getSetting('profiles.allow_users_enabling_open_profiles') && !$user->open_profile))): ?>
        <?php if(Auth::check()): ?>
            <?php if( !(isset($hasSub) && $hasSub) && !(isset($post) && PostsHelper::hasActiveSub(Auth::user()->id, $post->user->id)) && Auth::user()->id !== $user->id): ?>
                <div class="card mt-3 rounded-lg">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e(__('Subscription')); ?></h5>
                        <button class="btn btn-round btn-outline-primary btn-block d-flex align-items-center justify-content-center justify-content-lg-between mt-3 mb-0 to-tooltip <?php echo e((Auth::check() && !GenericHelper::isEmailEnforcedAndValidated() || !GenericHelper::creatorCanEarnMoney($user)) ? 'disabled' : ''); ?>"
                                <?php if(!Auth::user()->email_verified_at && getSetting('site.enforce_email_validation')): ?>
                                data-placement="top"
                                title="<?php echo e(__('Please verify your account')); ?>"
                                <?php elseif(!GenericHelper::creatorCanEarnMoney($user)): ?>
                                data-placement="top"
                                title="<?php echo e(__('This creator cannot earn money yet')); ?>"
                                <?php else: ?>
                                data-toggle="modal"
                                data-target="#checkout-center"
                                data-type="one-month-subscription"
                                data-recipient-id="<?php echo e($user->id); ?>"
                                data-amount="<?php echo e($user->profile_access_price); ?>"
                                data-first-name="<?php echo e(Auth::user()->first_name); ?>"
                                data-last-name="<?php echo e(Auth::user()->last_name); ?>"
                                data-billing-address="<?php echo e(Auth::user()->billing_address); ?>"
                                data-country="<?php echo e(Auth::user()->country); ?>"
                                data-city="<?php echo e(Auth::user()->city); ?>"
                                data-state="<?php echo e(Auth::user()->state); ?>"
                                data-postcode="<?php echo e(Auth::user()->postcode); ?>"
                                data-available-credit="<?php echo e(Auth::user()->wallet->total); ?>"
                                data-username="<?php echo e($user->username); ?>"
                                data-name="<?php echo e($user->name); ?>"
                                data-avatar="<?php echo e($user->avatar); ?>"
                            <?php endif; ?>
                        >
                            <span class="d-none d-md-block d-xl-block d-lg-block"><?php echo e(__('Subscribe')); ?></span>
                            <span class="d-none d-lg-block"><?php echo e(\App\Providers\SettingsServiceProvider::getWebsiteFormattedAmount($user->profile_access_price)); ?> <?php echo e(__('for')); ?> <?php echo e(trans_choice('days',30,['number'=>30])); ?></span>
                        </button>
                    </div>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e(__('Subscription')); ?></h5>
                    <button class="btn btn-round btn-outline-primary btn-block d-flex align-items-center justify-content-center justify-content-lg-between mt-3 mb-0"
                            data-toggle="modal"
                            data-target="#login-dialog"
                    >
                        <span class="d-none d-md-block d-xl-block d-lg-block"><?php echo e(__('Subscribe')); ?></span>
                        <span class="d-none d-lg-block"><?php echo e(\App\Providers\SettingsServiceProvider::getWebsiteFormattedAmount($user->profile_access_price)); ?> <?php echo e(__('for')); ?> <?php echo e(trans_choice('days',30,['number'=>30])); ?></span>
                    </button>
                </div>
            </div>
        <?php endif; ?>
    <?php elseif(!Auth::check() || (Auth::check() && Auth::user()->id !== $user->id)): ?>
        <?php if(Auth::check()): ?>
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e(__('Follow this creator')); ?></h5>
                    <button class="btn btn-round btn-outline-primary btn-block mt-3 mb-0 manage-follow-button" onclick="Lists.manageFollowsAction('<?php echo e($user->id); ?>')">
                        <span class="manage-follows-text"><?php echo e(\App\Providers\ListsHelperServiceProvider::getUserFollowingType($user->id, true)); ?></span>
                    </button>
                </div>
            </div>
        <?php else: ?>
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e(__('Follow this creator')); ?></h5>
                    <button class="btn btn-round btn-outline-primary btn-block mt-3 mb-0 text-center"
                            data-toggle="modal"
                            data-target="#login-dialog"
                    >
                        <span class="d-none d-md-block d-xl-block d-lg-block"><?php echo e(__('Follow')); ?></span>
                    </button>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <?php if(getSetting('custom-code-ads.sidebar_ad_spot')): ?>
        <div class="mt-3">
            <?php echo getSetting('custom-code-ads.sidebar_ad_spot'); ?>

        </div>
    <?php endif; ?>

    <?php echo $__env->make('template.footer-feed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/profile/widgets.blade.php ENDPATH**/ ?>