<div id="license" class="tab-pane fade in <?php if($group == $active && $active === 'License'): ?> active <?php endif; ?>">

    <div class="kind-of-a-form-control">

        <div class="panel-heading setting-row setting-theme_license" data-settingkey="license_product_license_key">
            <h3 class="panel-title">
                Product license code
            </h3>
        </div>

        <div class="panel-body no-padding-left-right setting-row" data-settingkey="license_product_license_key">
            <div class="col-md-12 no-padding-left-right">
                <input type="text" class="form-control license_product_license_key" name="license_product_license_key" placeholder="Your license key" value="<?php echo e(getSetting('license.product_license_key') ? getSetting('license.product_license_key') : ''); ?>">
            </div>
        </div>
        <div class="admin-setting-description">
            <code>
                Your product license key. Can be taken out of your <a href="https://codecanyon.net/downloads">Codecanyon downloads</a> page.
            </code>
        </div>

        <div class="d-none">
            <select class="form-control group_select d-none" name="license_product_license_key_group">
                <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="License" selected></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>


    </div>


</div>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/vendor/voyager/settings/lcode.blade.php ENDPATH**/ ?>