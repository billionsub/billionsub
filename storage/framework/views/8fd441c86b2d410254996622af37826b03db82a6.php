<?php if(count($posts)): ?>
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('elements.feed.post-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <hr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php echo $__env->make('elements.report-user-or-post',['reportStatuses' => ListsHelper::getReportTypes()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('elements.feed.post-delete-dialog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('elements.feed.post-list-management', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('elements.photoswipe-container', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-10">
            <img src="<?php echo e(asset('/img/no-content-available.svg')); ?>">
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <h5 class="text-center mb-2 mt-2"><?php echo e(__('No posts available')); ?></h5>
    </div>
<?php endif; ?>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/feed/posts-wrapper.blade.php ENDPATH**/ ?>