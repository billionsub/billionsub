<div class="suggestions-box<?php echo e($isMobile ? '-mobile':''); ?> border rounded-lg px-2 <?php echo e(isset($isMobile) ? 'pt-3 pb-1' : 'py-4'); ?>">
    <div class="d-flex justify-content-between suggestions-header mb-3 px-1">
        <h5 class="card-title pl-2 mb-0"><?php echo e(__('Suggestions')); ?></h5>
        <div class="d-flex">
            <div class="d-flex">
            </div>
            <div class="d-flex">
                <span class="mr-2 mr-xl-3 pointer-cursor" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Free account only')); ?>" onclick="SuggestionsSlider.loadSuggestions({'free':true <?php echo e(isset($isMobile) ? ", 'isMobile': true" : ''); ?>});">
                    <?php echo $__env->make('elements.icon',['icon'=>'pricetag-outline','variant'=>'medium','centered'=>false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                <span class="mr-2 mr-xl-3 pointer-cursor" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Refresh suggestions')); ?>" onclick="SuggestionsSlider.loadSuggestions(<?php echo e(isset($isMobile) ? "{'isMobile': true}" : ""); ?>)">
                   <?php echo $__env->make('elements.icon',['icon'=>'refresh','variant'=>'medium','centered'=>false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
            </div>
        </div>
    </div>
    <?php echo $__env->make('elements.feed.suggestions-wrapper',['profiles'=>$profiles], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/feed/suggestions-box.blade.php ENDPATH**/ ?>