<?php $__env->startSection('page_title', __(":username post",['username'=>$post->user->name])); ?>

<?php $__env->startSection('styles'); ?>
    <?php echo Minify::stylesheet([
            '/css/posts/post.css',
            '/libs/swiper/swiper-bundle.min.css',
            '/libs/photoswipe/dist/photoswipe.css',
            '/css/pages/checkout.css',
            '/libs/photoswipe/dist/default-skin/default-skin.css',
         ])->withFullUrl(); ?>

    <?php if(getSetting('feed.post_box_max_height')): ?>
        <?php echo $__env->make('elements.feed.fixed-height-feed-posts', ['height' => getSetting('feed.post_box_max_height')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo Minify::javascript([
            '/libs/swiper/swiper-bundle.min.js',
            '/js/PostsPaginator.js',
            '/js/CommentsPaginator.js',
            '/js/Post.js',
            '/js/pages/lists.js',
            '/js/pages/checkout.js',
            '/js/plugins/media/photoswipe.js',
            '/libs/photoswipe/dist/photoswipe-ui-default.min.js',
            '/js/plugins/media/mediaswipe.js',
            '/js/plugins/media/mediaswipe-loader.js',
            '/js/posts/view.js',
         ])->withFullUrl(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="min-vh-100 col-12 col-md-8 border-right  pr-md-0">
            <div class="feed-box mt-0 pt-4 mb-3 posts-wrapper">
                <?php echo $__env->make('elements.message-alert',['classes'=>'pt-0 pb-4 px-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('elements.feed.post-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <div class="col-12 col-md-4 d-none d-md-block pt-3">
            <?php echo $__env->make('elements.profile.widgets', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <?php echo $__env->make('elements.report-user-or-post',['reportStatuses' => ListsHelper::getReportTypes()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('elements.feed.post-delete-dialog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('elements.feed.post-list-management', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('elements.photoswipe-container', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('elements.checkout.checkout-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('elements.standard-dialog',[
        'dialogName' => 'comment-delete-dialog',
        'title' => __('Delete comment'),
        'content' => __('Are you sure you want to delete this comment?'),
        'actionLabel' => __('Delete'),
        'actionFunction' => 'Post.deleteComment();',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user-no-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/pages/post.blade.php ENDPATH**/ ?>