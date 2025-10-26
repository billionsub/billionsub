<?php $__env->startSection('page_title', __('Verify your email')); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-5 my-5">
        <div class="col-12 col-md-8 offset-md-2 mt-5">
            <div class="d-flex justify-content-center">
                <div class="col-12 col-md-6 d-none d-md-flex justify-content-center align-items-center">
                    <img src="<?php echo e(asset("/img/verify-email.svg")); ?>" class="img-fluid ">
                </div>
                <div class="col-12 col-md-7 d-flex align-items-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="col">
                            <h3 class="h1s text-bold"><?php echo e(__("Verify your email address")); ?></h3>
                            <?php if(session('resent')): ?>
                                <div class="alert alert-success text-white my-3" role="alert">
                                    <?php echo e(__('A fresh verification link has been sent to your email address.')); ?>

                                </div>
                            <?php endif; ?>
                            <p class="my-3">
                                <?php echo e(__('Before proceeding, please check your email for a verification link.')); ?>

                                <?php echo e(__('If you did not receive the email')); ?>.
                            </p>
                            <form class="d-flex w-100 flex-row flex-row " method="POST" action="<?php echo e(route('verification.resend')); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-primary"><?php echo e(__('click here to request another')); ?></button>
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.generic', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/public_html/resources/views/vendor/auth/verify.blade.php ENDPATH**/ ?>