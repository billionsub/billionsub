<form action="<?php echo e(route('search.get')); ?>" class="search-box-wrapper w-100" method="GET">
    <div class="input-group input-group-seamless-append">
        <input type="text" class="form-control shadow-none" aria-label="Text input with dropdown button" placeholder="<?php echo e(__("Search")); ?>" name="query" value="<?php echo e(isset($searchTerm) && $searchTerm ? $searchTerm : ''); ?>">
        <div class="input-group-append">
            <span class="input-group-text">
                <span class="h-pill h-pill-primary rounded file-upload-button" onclick="submitSearch();">
                    <?php echo $__env->make('elements.icon',['icon'=>'search'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
            </span>
        </div>
    </div>
    <input type="hidden" name="filter" value="<?php echo e(isset($activeFilter) && $activeFilter !== false ? $activeFilter : (getSetting('feed.default_search_widget_filter') ? getSetting('feed.default_search_widget_filter') : 'top')); ?>" />

    <?php if(isset($searchFilters['gender']) && $searchFilters['gender']): ?>
        <input type="hidden" name="gender" value="<?php echo e($searchFilters['gender']); ?>" />
    <?php endif; ?>

    <?php if(isset($searchFilters['min_age']) && $searchFilters['min_age']): ?>
        <input type="hidden" name="min_age" value="<?php echo e($searchFilters['min_age']); ?>" />
    <?php endif; ?>

    <?php if(isset($searchFilters['max_age']) && $searchFilters['max_age']): ?>
        <input type="hidden" name="max_age" value="<?php echo e($searchFilters['max_age']); ?>" />
    <?php endif; ?>

    <?php if(isset($searchFilters['location']) && $searchFilters['location']): ?>
        <input type="hidden" name="location" value="<?php echo e($searchFilters['location']); ?>" />
    <?php endif; ?>

</form>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/public_html/resources/views/elements/search-box.blade.php ENDPATH**/ ?>