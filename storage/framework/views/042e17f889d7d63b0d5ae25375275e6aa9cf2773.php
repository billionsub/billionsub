<?php if(count($posts)): ?>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('elements.search.users-list-element',['user'=>$user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <h5 class="text-center mb-2 mt-2"><?php echo e(__('No users were found')); ?></h5>
<?php endif; ?>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/search/users-wrapper.blade.php ENDPATH**/ ?>