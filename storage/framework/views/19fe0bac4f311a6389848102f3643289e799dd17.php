<div class="notifications-wrapper pt-4">
    <?php if(count($notifications)): ?>
    <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('elements.notifications.notification-box', ['notification' => $notification], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php if(!$loop->last): ?>
                <hr class="my-2 ">
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="d-flex flex-row-reverse mt-1 mb-1 mr-4">
            <?php echo e($notifications->onEachSide(1)->links()); ?>

        </div>
    <?php else: ?>
        <div class="py-2">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-8 d-flex justify-content-center align-items-center">
                    <img src="<?php echo e(asset('/img/no-notifications.svg')); ?>" class="no-notifications">
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <h5><?php echo e(__('Missing notifications')); ?></h5>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/notifications/notifications-wrapper.blade.php ENDPATH**/ ?>