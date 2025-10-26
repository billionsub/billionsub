<?php $__env->startSection('page_title', __('Update the script')); ?>
<?php $__env->startSection('scripts'); ?>
    <?php echo Minify::javascript([
            '/js/Installer.js',
         ])->withFullUrl(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid installer-bg">
        <div class="row no-gutter d-flex justify-content-center align-items-center min-vh-100">
            <div class="col-4">
                <div class="d-flex justify-content-center pb-5">
                    <a href="<?php echo e(route('home')); ?>">
                        <img class="brand-logo" src="<?php echo e(asset('/img/logo-black1.png')); ?>">
                    </a>
                </div>
                <div class="col card shadow-sm">
                    <h4 class="card-title mt-4 ml-2"><?php echo e(__("Update the platform")); ?></h4>
                    <div class="card-body mt-2">
                        <?php if(!$canMigrate && !session('success')): ?>
                            <div class="alert alert-warning text-white font-weight-bold mt-2" role="alert">
                                <?php echo e(__("Looks like there are no available updates on the current installation.")); ?>

                            </div>
                        <?php endif; ?>
                        <?php if(session('error')): ?>
                            <div class="alert alert-danger text-white font-weight-bold mt-2" role="alert">
                                <?php echo e(session('error')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <?php if(session('success')): ?>
                            <div class="alert alert-success text-white font-weight-bold mt-2" role="alert">
                                <?php echo e(session('success')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <div>
                            <p><?php echo e(__("Before proceeding with an update, please ensure that")); ?>:</p>
                            <ul>
                                <li><?php echo e(__("You've backed up your files.")); ?></li>
                                <li><?php echo e(__("You've backed up your database.")); ?></li>
                                <li><?php echo e(__("You've copied the updated files onto your public directory.")); ?></li>
                            </ul>
                        </div>
                        <form method="POST" action="<?php echo e(route('installer.doUpdate')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <a href="<?php echo e(route('home')); ?>" class=""><?php echo e(__("Go home")); ?></a>
                                <button type="submit" class="btn btn-primary m-0 <?php echo e($canMigrate ? '' : 'disabled'); ?>" <?php echo e($canMigrate ? '' : 'disabled'); ?>><?php echo e(__("Update")); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.install', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/installer/upgrade.blade.php ENDPATH**/ ?>