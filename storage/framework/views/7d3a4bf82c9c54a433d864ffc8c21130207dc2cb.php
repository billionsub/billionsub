<?php if(session('success')): ?>
    <div class="alert alert-success text-white font-weight-bold mt-2" role="alert">
        <?php echo e(session('success')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="alert alert-warning text-white font-weight-bold mt-2" role="alert">
        <?php echo e(session('error')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php if(Auth::user()->verification && (Auth::user()->verification->rejectionReason && Auth::user()->verification->status === 'rejected' ) ): ?>
    <div class="alert alert-warning text-white font-weight-bold mt-2" role="alert">
        <?php echo e(__("Your previous verification attempt was rejected for the following reason:")); ?> "<?php echo e(Auth::user()->verification->rejectionReason); ?>"
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<form class="verify-form" action="<?php echo e(route('my.settings.verify.save')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <p><?php echo e(__('In order to get verified and receive your badge, please take care of the following steps:')); ?></p>
    <div class="d-flex align-items-center mb-1 ml-4">
        <?php if(Auth::user()->email_verified_at): ?>
            <?php echo $__env->make('elements.icon',['icon'=>'checkmark-circle-outline','variant'=>'medium', 'classes'=>'text-success mr-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <?php echo $__env->make('elements.icon',['icon'=>'close-circle-outline','variant'=>'medium', 'classes'=>'text-warning mr-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php echo e(__('Confirm your email address.')); ?>

    </div>
    <div class="d-flex align-items-center mb-1 ml-4">
        <?php if(Auth::user()->birthdate): ?>
            <?php echo $__env->make('elements.icon',['icon'=>'checkmark-circle-outline','variant'=>'medium', 'classes'=>'text-success mr-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <?php echo $__env->make('elements.icon',['icon'=>'close-circle-outline','variant'=>'medium', 'classes'=>'text-warning mr-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php echo e(__('Set your birthdate.')); ?>

    </div>
    <div class="d-flex align-items-center ml-4">
        <?php if((Auth::user()->verification && Auth::user()->verification->status == 'verified')): ?>
            <?php echo $__env->make('elements.icon',['icon'=>'checkmark-circle-outline','variant'=>'medium', 'classes'=>'text-success mr-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(__('Upload a Goverment issued ID card.')); ?>

        <?php else: ?>
            <?php if(!Auth::user()->verification || (Auth::user()->verification && Auth::user()->verification->status !== 'verified' && Auth::user()->verification->status !== 'pending')): ?>
                <?php echo $__env->make('elements.icon',['icon'=>'close-circle-outline','variant'=>'medium', 'classes'=>'text-warning mr-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(__('Upload a Goverment issued ID card.')); ?>

            <?php else: ?>
                <?php echo $__env->make('elements.icon',['icon'=>'time-outline','variant'=>'medium', 'classes'=>'text-primary mr-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(__('Identity check in progress.')); ?>

            <?php endif; ?>
        <?php endif; ?>
    </div>
    <?php if((!Auth::user()->verification || (Auth::user()->verification && Auth::user()->verification->status !== 'verified' && Auth::user()->verification->status !== 'pending')) ): ?>
        <h5 class="mt-5 mb-3"><?php echo e(__("Complete your verification")); ?></h5>
        <p class="mb-1 mt-2"><?php echo e(__("Please attach clear photos of your ID card back and front side.")); ?></p>
        <div class="dropzone-previews dropzone w-100 ppl-0 pr-0 pt-1 pb-1 border rounded"></div>
        <small class="form-text text-muted mb-2"><?php echo e(__("Allowed file types")); ?>: <?php echo e(str_replace(',',', ',AttachmentHelper::filterExtensions('manualPayments'))); ?>. <?php echo e(__("Max size")); ?>: 4 <?php echo e(__("MB")); ?>.</small>
        <div class="d-flex flex-row-reverse">
            <button class="btn btn-primary mt-2"><?php echo e(__("Submit")); ?></button>
        </div>
    <?php endif; ?>
    <?php if(Auth::user()->email_verified_at && Auth::user()->birthdate && (Auth::user()->verification && Auth::user()->verification->status == 'verified')): ?>
        <p class="mt-3"><?php echo e(__("Your info looks good, you're all set to post new content!")); ?></p>
        <?php endif; ?>
</form>
<?php echo $__env->make('elements.uploaded-file-preview-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/settings/settings-verify.blade.php ENDPATH**/ ?>