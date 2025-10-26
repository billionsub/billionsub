<?php if(session('success')): ?>
    <div class="alert alert-success text-white font-weight-bold mt-2" role="alert">
        <?php echo e(session('success')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="<?php echo e(__('Close')); ?>">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php if(getSetting('profiles.allow_users_enabling_open_profiles') && Auth::user()->open_profile): ?>
    <div class="alert alert-warning text-white font-weight-bold mt-2" role="alert">
        <?php echo e(__("Your profile is set to 'Open profile', meaning your profile will be treated as free one")); ?>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<form method="POST" action="<?php echo e(route('my.settings.rates.save')); ?>">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="paid-profile" name="paid-profile"
                <?php echo e(isset(Auth::user()->paid_profile) ? (Auth::user()->paid_profile == '1' ? 'checked' : '') : false); ?>>
            <label class="custom-control-label" for="paid-profile"><?php echo e(__('Paid profile')); ?></label>
        </div>
    </div>
    <div class="paid-profile-rates <?php echo e(isset(Auth::user()->paid_profile) ? (Auth::user()->paid_profile == '1' ? '' : 'd-none') : ''); ?>">
        <div class="form-group">
            <label for="name"><?php echo e(__('Your profile subscription price')); ?></label>
            <div class="input-group mb-3">
                <input class="form-control <?php echo e($errors->has('profile_access_price') ? 'is-invalid' : ''); ?>" id="profile_access_price" name="profile_access_price" aria-describedby="emailHelp" value="<?php echo e(Auth::user()->profile_access_price); ?>">
                <?php if($offer): ?>
                    <div class="input-group-append">
                        <span class="input-group-text"><?php echo e(__('Old')); ?>: <?php echo e($offer->old_profile_access_price); ?></span>
                    </div>
                <?php endif; ?>
            </div>
            <?php if($errors->has('profile_access_price')): ?>
                <span class="invalid-feedback" role="alert">
                <strong><?php echo e(__($errors->first('profile_access_price'))); ?></strong>
            </span>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="name"><?php echo e(__('3 months subscription price')); ?></label>
            <div class="input-group mb-3">
                <input class="form-control <?php echo e($errors->has('profile_access_price_3_months') ? 'is-invalid' : ''); ?>" id="profile_access_price" name="profile_access_price_3_months" aria-describedby="emailHelp" value="<?php echo e(Auth::user()->profile_access_price_3_months); ?>">
                <?php if($offer && $offer->old_profile_access_price_3_months): ?>
                    <div class="input-group-append">
                        <span class="input-group-text"><?php echo e(__('Old')); ?>: <?php echo e($offer->old_profile_access_price_3_months); ?></span>
                    </div>
                <?php endif; ?>
            </div>
            <?php if($errors->has('profile_access_price_3_months')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e(__($errors->first('profile_access_price_3_months'))); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="name"><?php echo e(__('6 months subscription price')); ?></label>
            <div class="input-group mb-3">
                <input class="form-control <?php echo e($errors->has('profile_access_price_6_months') ? 'is-invalid' : ''); ?>" id="profile_access_price" name="profile_access_price_6_months" aria-describedby="emailHelp" value="<?php echo e(Auth::user()->profile_access_price_6_months); ?>">
                <?php if($offer && $offer->old_profile_access_price_6_months): ?>
                    <div class="input-group-append">
                        <span class="input-group-text"><?php echo e(__('Old')); ?>: <?php echo e($offer->old_profile_access_price_6_months); ?></span>
                    </div>
                <?php endif; ?>
            </div>
            <?php if($errors->has('profile_access_price_6_months')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e(__($errors->first('profile_access_price_6_months'))); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="name"><?php echo e(__('12 months subscription price')); ?></label>
            <div class="input-group mb-3">
                <input class="form-control <?php echo e($errors->has('profile_access_price_12_months') ? 'is-invalid' : ''); ?>" id="profile_access_price_12_months" name="profile_access_price_12_months" aria-describedby="emailHelp" value="<?php echo e(Auth::user()->profile_access_price_12_months); ?>">
                <?php if($offer && $offer->old_profile_access_price_12_months): ?>
                    <div class="input-group-append">
                        <span class="input-group-text"><?php echo e(__('Old')); ?>: <?php echo e($offer->old_profile_access_price_12_months); ?></span>
                    </div>
                <?php endif; ?>
            </div>
            <?php if($errors->has('profile_access_price_12_months')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e(__($errors->first('profile_access_price_12_months'))); ?></strong>
                </span>
            <?php endif; ?>
        </div>

        <?php if(!getSetting('profiles.disable_profile_offers')): ?>
            <div class="form-group">
                <label for="name"><?php echo e(__('Is offer until')); ?></label>
                <div class="input-group-prepend">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" aria-label="Checkbox for following text input" name="is_offer" id="is_offer" <?php echo e(Auth::user()->offer && Auth::user()->offer->expires_at ? 'checked' : ''); ?>>
                        </div>
                    </div>
                    <input type="date" class="form-control <?php echo e($errors->has('profile_access_offer_date') ? 'is-invalid' : ''); ?>" id="profile_access_offer_date" name="profile_access_offer_date" aria-describedby="emailHelp" value="<?php echo e(Auth::user()->offer && Auth::user()->offer->expires_at ? Auth::user()->offer->expires_at->format('Y-m-d') : ''); ?>">

                </div>
                <small class="form-text text-muted">
                    <?php echo e(__("In order to start a promotion, reduce your monthly prices and select a future promotion end date.")); ?>

                </small>
                <?php if($errors->has('profile_access_offer_date')): ?>
                    <span class="invalid-feedback" role="alert">
                    <strong><?php echo e(__($errors->first('profile_access_offer_date'))); ?></strong>
                </span>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <button class="btn btn-primary btn-block rounded mr-0" type="submit"><?php echo e(__('Save')); ?></button>
    </div>
</form>


<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/settings/settings-rates.blade.php ENDPATH**/ ?>