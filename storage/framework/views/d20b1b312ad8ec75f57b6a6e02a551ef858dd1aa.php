<!-- Collapsible Menu -->
<div class="collapse d-lg-block settings-nav" id="settingsNav">
    <div class="card-settings border-bottom">
        <div class="list-group list-group-sm list-group-flush">
            <?php $__currentLoopData = $availableSettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route => $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('my.settings', ['type' => $route])); ?>" class="list-group-item list-group-item-action d-flex justify-content-between <?php echo e($activeSettingsTab == $route ? 'active' : ''); ?>">
                    <div class="d-flex align-items-center">
                        <?php echo $__env->make('elements.icon', ['icon' => $setting['icon'].'-outline', 'centered' => 'false', 'classes' => 'mr-3', 'variant' => 'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <span><?php echo e(ucfirst(__($route))); ?></span>
                    </div>
                    <div class="d-flex align-items-center">
                        <?php echo $__env->make('elements.icon', ['icon' => 'chevron-forward-outline'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/settings/settings-menu.blade.php ENDPATH**/ ?>