<?php if(count($streams)): ?>
    <?php $__currentLoopData = $streams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stream): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('elements.streams.stream-element-public',[
                'stream'=>$stream,
                'showLiveIndicators' => isset($showLiveIndicators) && $showLiveIndicators ? true : false,
                'showUsername' => isset($showUsername) && $showUsername == false ? false : true,
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <h5 class="text-center mb-2 mt-2"><?php echo e(__('No streams were found')); ?></h5>
<?php endif; ?>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/search/streams-wrapper.blade.php ENDPATH**/ ?>