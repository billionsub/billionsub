<?php if($variant == 'desktop'): ?>
    <div class="card-settings border-bottom">
        <div class="list-group list-group-sm list-group-flush">
            <?php $__currentLoopData = $bookmarkTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route => $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('my.bookmarks',['type'=>$route])); ?>" class="<?php echo e($activeTab == $route ? 'active' : ''); ?> list-group-item list-group-item-action d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <?php echo $__env->make('elements.icon',['icon'=>$setting['icon'].'-outline','centered'=>'false','classes'=>'mr-3','variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <span><?php echo e(__(ucfirst($route))); ?></span>
                    </div>
                    <div class="d-flex align-items-center">
                        <?php echo $__env->make('elements.icon',['icon'=>'chevron-forward-outline'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php else: ?>
    <div class="mt-3 inline-border-tabs text-bold">
        <nav class="nav nav-pills nav-justified pr-3 pr-md-0">
            <?php $__currentLoopData = $bookmarkTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route => $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="nav-item nav-link <?php echo e($activeTab == $route ? 'active' : ''); ?>" href="<?php echo e(route('my.bookmarks',['type'=>$route])); ?>">
                    <div class="d-flex justify-content-center">
                        <?php echo $__env->make('elements.icon',['icon'=>$setting['icon'].'-outline','centered'=>'false','variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </nav>
    </div>
<?php endif; ?>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/bookmarks/bookmarks-menu.blade.php ENDPATH**/ ?>