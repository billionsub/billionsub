<nav class="nav nav-pills nav-justified notifications-nav pr-3 pr-md-0">
    <a class="nav-item nav-link text-bold <?php echo e(!$activeType ? 'active' : ''); ?>" href="<?php echo e(route('my.notifications')); ?>">
        <div class="d-flex justify-content-center">
            <?php echo $__env->make('elements.icon',['icon'=>'list-outline','centered'=>false,'variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <span class="d-none d-md-block ml-2"><?php echo e(__('All')); ?></span>
        </div>
    </a>
    <?php $__currentLoopData = $notificationTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a class="nav-item nav-link text-bold <?php echo e($activeType == $type ? 'active' : ''); ?>" href="<?php echo e(route('my.notifications',['type' => $type])); ?>">
            <div class="d-flex justify-content-center">
                <span>
                <?php switch($type):
                    case ('messages'): ?>
                    <?php echo $__env->make('elements.icon',['icon'=>'chatbubbles-outline','centered' => false,'variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php break; ?>
                    <?php case ('likes'): ?>
                    <?php echo $__env->make('elements.icon',['icon'=>'heart-outline','centered' => false,'variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php break; ?>
                    <?php case ('subscriptions'): ?>
                    <?php echo $__env->make('elements.icon',['icon'=>'people-circle-outline','centered' => false,'variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php break; ?>
                    <?php case ('tips'): ?>
                    <?php echo $__env->make('elements.icon',['icon'=>'gift-outline','centered' => false,'variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php break; ?>
                    <?php case ('promos'): ?>
                    <?php echo $__env->make('elements.icon',['icon'=>'sparkles-outline','centered' => false,'variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php break; ?>
                    <?php case ('PPV'): ?>
                    <?php echo $__env->make('elements.icon',['icon'=>'lock-open-outline','centered' => false,'variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php break; ?>
                <?php endswitch; ?>
                </span>

                <span class="d-none d-md-block ml-2"><?php echo e(__(ucfirst($type))); ?></span>
            </div>
        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</nav>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/notifications/notifications-menu.blade.php ENDPATH**/ ?>