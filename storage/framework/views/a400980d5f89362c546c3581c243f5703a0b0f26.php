<?php $__env->startSection('page_title', __('Your lists')); ?>

<?php $__env->startSection('styles'); ?>
    <?php echo Minify::stylesheet([
            '/css/pages/lists.css'
         ])->withFullUrl(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo Minify::javascript([
            '/js/pages/lists.js'
         ])->withFullUrl(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="min-vh-100 border-right col-12 pr-md-0">
            <div class="pt-4 d-flex justify-content-between align-items-center px-3 pb-3 border-bottom">
                <div>
                    <h5 class="text-truncate text-bold mb-0 <?php echo e((Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme') == 'dark' ? '' : 'text-dark-r') : (Cookie::get('app_theme') == 'dark' ? '' : 'text-dark-r'))); ?>"><?php echo e(__('Lists')); ?></h5>
                </div>
                <button class="btn btn-outline-primary btn-sm px-3 mb-0" onclick="Lists.showListEditDialog()" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Add list')); ?>">
                    <?php echo $__env->make('elements.icon',['icon'=>'add'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </button>
            </div>
            <div class="lists-wrapper mt-2">
                <?php if(count($lists)): ?>
                    <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('elements.lists.list-box', ['list'=>$list, 'isLastItem' => (count($lists) == $key + 1)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <p class="ml-4"><?php echo e(__('No lists available')); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php echo $__env->make('elements.lists.list-update-dialog',['mode'=>'create'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user-no-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/pages/lists.blade.php ENDPATH**/ ?>