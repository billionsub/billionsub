<?php $__env->startSection('page_title', __('Bookmarks')); ?>

<?php $__env->startSection('styles'); ?>
    <?php echo Minify::stylesheet([
            '/libs/swiper/swiper-bundle.min.css',
            '/libs/photoswipe/dist/photoswipe.css',
            '/libs/photoswipe/dist/default-skin/default-skin.css',
            '/css/pages/bookmarks.css',
            '/css/posts/post.css',
            '/css/pages/checkout.css'
         ])->withFullUrl(); ?>

    <?php if(getSetting('feed.post_box_max_height')): ?>
        <?php echo $__env->make('elements.feed.fixed-height-feed-posts', ['height' => getSetting('feed.post_box_max_height')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo Minify::javascript([
            '/js/pages/checkout.js',
            '/js/PostsPaginator.js',
            '/js/CommentsPaginator.js',
            '/js/Post.js',
             '/js/pages/lists.js',
            '/js/pages/bookmarks.js',
            '/libs/swiper/swiper-bundle.min.js',
            '/js/plugins/media/photoswipe.js',
            '/libs/photoswipe/dist/photoswipe-ui-default.min.js',
            '/js/plugins/media/mediaswipe.js',
            '/js/plugins/media/mediaswipe-loader.js',
         ])->withFullUrl(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="">
        <div class="row">

            <div class="col-12 col-md-6 col-lg-3 mb-3 settings-menu pr-0">
                <div class="bookmarks-menu-wrapper">
                    <div class="mt-3 ml-3">
                        <h5 class="text-bold <?php echo e((Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme') == 'dark' ? '' : 'text-dark-r') : (Cookie::get('app_theme') == 'dark' ? '' : 'text-dark-r'))); ?>"><?php echo e(__('Bookmarks')); ?></h5>
                    </div>
                    <hr class="mb-0">
                    <div class="d-lg-block bookmarks-nav">
                        <div class="d-none d-md-block">
                            <?php echo $__env->make('elements.bookmarks.bookmarks-menu',['variant' => 'desktop'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="bookmarks-menu-mobile d-block d-md-none mt-3">
                            <?php echo $__env->make('elements.bookmarks.bookmarks-menu',['variant' => 'mobile'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-9 mb-5 mb-lg-0 min-vh-100 border-left border-right settings-content pl-md-0 pr-md-0">
                <div class="px-2 px-md-3">
                    <?php if(isset($filterType)): ?>
                        <?php echo e($filterType); ?>

                    <?php endif; ?>
                </div>
                <?php echo $__env->make('elements.feed.posts-load-more', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="feed-box mt-0  pt-4 posts-wrapper">
                    <?php echo $__env->make('elements.feed.posts-wrapper',['posts'=>$posts], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <?php echo $__env->make('elements.feed.posts-loading-spinner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <?php echo $__env->make('elements.checkout.checkout-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <div class="d-none">
        <ion-icon name="heart"></ion-icon>
        <ion-icon name="heart-outline"></ion-icon>
    </div>

    <?php echo $__env->make('elements.standard-dialog',[
        'dialogName' => 'comment-delete-dialog',
        'title' => __('Delete comment'),
        'content' => __('Are you sure you want to delete this comment?'),
        'actionLabel' => __('Delete'),
        'actionFunction' => 'Post.deleteComment();',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user-no-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/pages/bookmarks.blade.php ENDPATH**/ ?>