<?php $__env->startSection('page_title', __('Page not found')); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class=" d-flex justify-content-center align-items-center min-vh-65" >
            <div class="error-container d-flex flex-column">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="<?php echo e(asset('/img/404.svg')); ?>">
                </div>
                <div class="text-center">
                    <h3 class="text-bold"><?php echo e(__('Page Not found')); ?></h3>
                    <p><?php echo e(__('The page you are looking for is not available.')); ?></p>
                    <div class="d-flex mt-2 justify-content-center">
                        <a href="<?php echo e(route('home')); ?>" class="right"><?php echo e(__('Go home')); ?> »</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.generic', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/public_html/resources/views/errors/404.blade.php ENDPATH**/ ?>