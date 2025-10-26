<div class="form-group ">
    <div class="card py-3 px-3">
        <div class="custom-control custom-switch custom-switch">
            <input type="checkbox" class="custom-control-input" id="public_profile" <?php echo e(Auth::user()->public_profile ? 'checked' : ''); ?>>
            <label class="custom-control-label" for="public_profile"><?php echo e(__('Is public account')); ?></label>
        </div>
        <div class="mt-2">
            <span><?php echo e(__('Having your profile set to private means:')); ?></span>
            <ul class="mt-1 mb-2">
                <li><?php echo e(__('It will be hidden for search engines and unregistered users entirely.')); ?></li>
                <li><?php echo e(__('It will also be generally hidden from suggestions and user searches on our platform.')); ?></li>
            </ul>
        </div>
    </div>

    <?php if(getSetting('profiles.allow_users_enabling_open_profiles')): ?>
        <div class="card py-3 px-3  mt-3">
            <div class="custom-control custom-switch custom-switch">
                <input type="checkbox" class="custom-control-input" id="open_profile" <?php echo e(Auth::user()->open_profile ? 'checked' : ''); ?>>
                <label class="custom-control-label" for="open_profile"><?php echo e(__('Open profile')); ?></label>
            </div>
            <div class="mt-2">
                <span><?php echo e(__('Having your profile set to open means:')); ?></span>
                <ul class="mt-1 mb-2">
                    <li><?php echo e(__('Both registered and unregistered users will be able to see your posts.')); ?></li>
                    <li><?php echo e(__('If account is private, the content will only be available for registered used.')); ?></li>
                    <li><?php echo e(__('Paid posts will still be locked for open profiles.')); ?></li>
                </ul>
            </div>
        </div>
    <?php endif; ?>


    <?php if(getSetting('security.allow_geo_blocking')): ?>
        <div class="mb-3 card py-3 mt-3">
            <div class="">
                <div class="custom-control custom-switch custom-switch">
                    <div class="ml-3">
                        <input type="checkbox" class="custom-control-input" id="enable_geoblocking" <?php echo e(Auth::user()->enable_geoblocking ? 'checked' : ''); ?>>
                        <label class="custom-control-label" for="enable_geoblocking"><?php echo e(__('Enable Geo-blocking')); ?></label>
                    </div>
                    <div class="ml-3 mt-2">
                        <small class="fa-details-label"><?php echo e(__("If enabled, visitors from certain countries will be restricted access.")); ?></small>
                    </div>
                </div>
            </div>
            <div class="form-group px-2 mx-3 mt-2">
                <label for="countrySelect">
                    <span><?php echo e(__('Country')); ?></span>
                </label>
                <select class="country-select form-control input-sm uifield-country" id="countrySelect" required multiple="multiple">
                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($country->name !== 'All'): ?>
                            <option><?php echo e($country->name); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
    <?php endif; ?>

    <?php if(getSetting('security.allow_users_2fa_switch')): ?>
        <div class="mb-3 card py-3 mt-3">

            <div class="custom-control custom-switch custom-switch">
                <div class="ml-3">
                    <input type="checkbox" class="custom-control-input" id="enable_2fa" <?php echo e(Auth::user()->enable_2fa ? 'checked' : ''); ?>>
                    <label class="custom-control-label" for="enable_2fa"><?php echo e(__('Enable email 2FA')); ?></label>
                </div>
                <div class="ml-3 mt-2">
                    <small class="fa-details-label"><?php echo e(__("If enabled, access from new devices will be restricted until verified.")); ?></small>
                </div>
            </div>

            <div class="allowed-devices mx-3 mt-2 <?php echo e(Auth::user()->enable_2fa ? '' : 'd-none'); ?>">
                <div class="lists-wrapper mt-2">
                    <div class="px-2 list-item">
                        <?php if($verifiedDevicesCount): ?>
                            <p class="h6 text-bolder mb-2 text-bold-600"><?php echo e(__("Allowed devices")); ?></p>
                            <?php echo $__env->make('elements.settings.user-devices-list', ['type' => 'verified'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <?php if($unverifiedDevicesCount): ?>
                            <p class="h6 text-bolder mb-2 text-bold-600 mt-3"><?php echo e(__("Un-verified devices")); ?></p>
                            <?php echo $__env->make('elements.settings.user-devices-list', ['type' => 'unverified'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>

</div>

<?php echo $__env->make('elements.settings.device-delete-dialog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/settings/settings-privacy.blade.php ENDPATH**/ ?>