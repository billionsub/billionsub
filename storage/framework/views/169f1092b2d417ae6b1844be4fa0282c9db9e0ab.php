<?php $__env->startSection('page_title', __('Too Many Requests')); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class=" d-flex justify-content-center align-items-center min-vh-65" >
            <div class="error-container d-flex flex-column">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="<?php echo e(asset('/img/500.svg')); ?>">
                </div>
                <div class="text-center">
                    <h3 class="text-bold">429 | <?php echo e(__('Too Many Requests')); ?></h3>
                    <div class="d-flex justify-content-center mt-2">
                        <a href="<?php echo e(route('home')); ?>" class="right"><?php echo e(__('Go home')); ?> »</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.generic', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/errors/405.blade.php ENDPATH**/ ?>