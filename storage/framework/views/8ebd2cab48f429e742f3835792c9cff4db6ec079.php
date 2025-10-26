<div class="suggestions-content">
    <?php if(count($profiles) > 0): ?>
    <div class="swiper-container mySwiper">
        <div class="swiper-wrapper">
            <?php $__currentLoopData = $profiles->chunk(GenericHelper::isMobileDevice() ? 2 : (int)getSetting('feed.feed_suggestions_card_per_page')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profilesSet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide px-1">
                    <?php $__currentLoopData = $profilesSet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('elements.feed.suggestion-card',['profile' => $profile ,'isListMode' => false, 'isListManageable' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="d-flex align-items-center justify-content-center swiper-pagination-wrapper">
        <div class="swiper-pagination" ></div>
    </div>
    <?php else: ?>
        <p class="text-center"><?php echo e(__('No suggestions available')); ?></p>
    <?php endif; ?>
</div>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/public_html/resources/views/elements/feed/suggestions-wrapper.blade.php ENDPATH**/ ?>