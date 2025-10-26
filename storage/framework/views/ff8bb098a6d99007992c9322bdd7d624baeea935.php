<div class="<?php echo e($size); ?>">
    <div class="card shadow rounded border-0 h-100">
        <div class="card-body">
            <form name="<?php echo e($name); ?>" action="<?php echo e(route($route)); ?>" method="get">
                <div class="row">
                    <div class="col-md-10 col-xs-12">
                        <div class="text-muted font-weight-bolder fs-5"><?php echo e($title); ?></div>
                    </div>
                    <div class="col-md-2 col-xs-12">
                        <input type="hidden" name="function" value="<?php echo e($form['function']); ?>">
                        <select name="range" class="form-control form-control-sm card-value">
                            <?php $__currentLoopData = $form['ranges']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $range): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($range); ?>" <?php if($form['range'] == $range): ?> selected <?php endif; ?>><?php echo e($range); ?> <?php echo e($range == 1 ? $form['trans'][0] : $form['trans'][1]); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="h2 mt-3" data-card-value></div>
                        <div class="mb-2 mt-3" data-card-loading>
                            <div class="spinner-border text-primary" role="status"></div>
                        </div>

                        <div class="text-muted font-weight-medium">
                    <span class="d-none text-success" data-card-status-increase>
                        <div class="d-flex align-items-center">
                            <div class="icon voyager-angle-up"></div>
                            <div class="d-flex">
                                <span class="chart-trend d-flex align-items-center text-success mr-2"></span> <span data-card-increase-growth></span>% <?php echo e(__('Increase')); ?>

                            </div>
                        </div>
                    </span>
                            <span class="d-none text-danger" data-card-status-decrease>
                                <div class="d-flex align-items-center">
                                <div class="icon voyager-angle-down"></div>
                                <div class="d-flex">
                                    <span class="chart-trend d-flex align-items-center text-danger mr-2"></span> <span data-card-decrease-growth></span>% <?php echo e(__('Decrease')); ?>

                                </div>
                           </div>
                    </span>
                            <span class="d-none" data-card-status-constant><?php echo e(__('Constant')); ?></span>
                            <span class="d-none" data-card-status-npd><?php echo e(__('No prior data')); ?></span>
                            <span class="d-none" data-card-status-ncd><?php echo e(__('No current data')); ?></span>
                            <span class="d-none text-danger" data-card-status-error></span>
                            <span data-card-status-loading><?php echo e(__('Loading...')); ?></span>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>
<script>
    "use strict";
    document.addEventListener("DOMContentLoaded", function() {
        getCardValue(document.querySelector('form[name="<?php echo e($name); ?>"]'), '<?php echo e(__('thousands_separator')); ?>');
        document.querySelector('form[name="<?php echo e($name); ?>"] select[name="range"]').addEventListener('change' , function() {
            getCardValue(document.querySelector('form[name="<?php echo e($name); ?>"]'), '<?php echo e(__('thousands_separator')); ?>');
        });
    });
</script>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/public_html/resources/views/elements/admin/value_card.blade.php ENDPATH**/ ?>