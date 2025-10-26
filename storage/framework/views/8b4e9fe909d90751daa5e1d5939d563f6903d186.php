<?php $__env->startSection('page_title', __('Your feed')); ?>


<?php $__env->startSection('styles'); ?>
    <?php echo Minify::stylesheet([
            '/libs/swiper/swiper-bundle.min.css',
            '/libs/photoswipe/dist/photoswipe.css',
            '/css/pages/checkout.css',
            '/libs/photoswipe/dist/default-skin/default-skin.css',
            '/css/pages/feed.css',
            '/css/posts/post.css',
            '/css/pages/search.css',
         ])->withFullUrl(); ?>

    <?php if(getSetting('feed.post_box_max_height')): ?>
        <?php echo $__env->make('elements.feed.fixed-height-feed-posts', ['height' => getSetting('feed.post_box_max_height')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <?php echo Minify::javascript([
            '/js/PostsPaginator.js',
            '/js/CommentsPaginator.js',
            '/js/Post.js',
            '/js/SuggestionsSlider.js',
            '/js/pages/lists.js',
            '/js/pages/feed.js',
            '/js/pages/checkout.js',
            '/libs/swiper/swiper-bundle.min.js',
            '/js/plugins/media/photoswipe.js',
            '/libs/photoswipe/dist/photoswipe-ui-default.min.js',
            '/js/plugins/media/mediaswipe.js',
            '/js/plugins/media/mediaswipe-loader.js',
         ])->withFullUrl(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-8 col-md-7 second p-0 ">
                <div class="d-flex d-md-none px-3 py-3 feed-mobile-search neutral-bg fixed-top-m">
                    <?php echo $__env->make('elements.search-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <?php if(!getSetting('feed.hide_suggestions_slider')): ?>
                    <div class="d-block d-md-none d-lg-none m-pt-70 feed-suggestions-wrapper">
                        <?php echo $__env->make('elements.feed.suggestions-box',['profiles'=>$suggestions, 'isMobile'=> true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endif; ?>

                

                <div class="">
                    <?php echo $__env->make('elements.message-alert',['classes'=>'pt-4 pb-4 px-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('elements.feed.posts-load-more', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="feed-box mt-0 pt-4 posts-wrapper">
                        <?php echo $__env->make('elements.feed.posts-wrapper',['posts'=>$posts], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <?php echo $__env->make('elements.feed.posts-loading-spinner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-4 first border-left order-0 pt-4 pb-5 min-vh-100 suggestions-wrapper d-none d-md-block">

                <div class="feed-widgets">
                    <div class="mb-3">
                        <?php echo $__env->make('elements.search-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <?php if(!getSetting('feed.hide_suggestions_slider')): ?>
                        <?php echo $__env->make('elements.feed.suggestions-box',['profiles'=>$suggestions, 'isMobile'=> false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    <?php if(getSetting('custom-code-ads.sidebar_ad_spot')): ?>
                        <div class="mt-3">
                            <?php echo getSetting('custom-code-ads.sidebar_ad_spot'); ?>

                        </div>
                    <?php endif; ?>

                    <?php echo $__env->make('template.footer-feed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                </div>

            </div>
        </div>
        <?php echo $__env->make('elements.checkout.checkout-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

<?php echo $__env->make('layouts.user-no-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/pages/feed.blade.php ENDPATH**/ ?>