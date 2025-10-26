<button class="btn btn-round btn-lg btn-primary btn-block d-flex justify-content-between mt-3 mb-2 px-5 to-tooltip <?php echo e(((Auth::check() && !GenericHelper::isEmailEnforcedAndValidated()) || (Auth::check() && !GenericHelper::creatorCanEarnMoney($user)) ) ? 'disabled' : ''); ?>"
        <?php if(Auth::check()): ?>
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
                data-amount="<?php echo e($user->profile_access_price ? $user->profile_access_price : 0); ?>"
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
        <?php else: ?>
            data-toggle="modal"
            data-target="#login-dialog"
    <?php endif; ?>
>
    <span><?php echo e(__('Subscribe')); ?></span>
    <span class="">
        <?php echo e(\App\Providers\SettingsServiceProvider::getWebsiteFormattedAmount($user->profile_access_price)); ?>

        <?php echo e(__('for')); ?>

        <?php echo e(trans_choice('days', 30,['number'=>30])); ?></span>
</button>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/checkout/subscribe-button-30.blade.php ENDPATH**/ ?>