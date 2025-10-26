<?php $__env->startSection('page_title', __('Discover')); ?>
<?php $__env->startSection('share_url', route('home')); ?>
<?php $__env->startSection('share_title', getSetting('site.name') . ' - ' . getSetting('site.slogan')); ?>
<?php $__env->startSection('share_description', getSetting('site.description')); ?>
<?php $__env->startSection('share_type', 'article'); ?>
<?php $__env->startSection('share_img', GenericHelper::getOGMetaImage()); ?>

<?php $__env->startSection('meta'); ?>
    <meta name="robots" content="noindex">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo Minify::javascript([
            '/js/PostsPaginator.js',
            '/js/UsersPaginator.js',
            '/js/StreamsPaginator.js',
            '/js/CommentsPaginator.js',
            '/js/Post.js',
            '/js/SuggestionsSlider.js',
            '/js/pages/lists.js',
            '/js/pages/checkout.js',
            '/libs/swiper/swiper-bundle.min.js',
            '/js/plugins/media/photoswipe.js',
            '/libs/photoswipe/dist/photoswipe-ui-default.min.js',
            '/js/plugins/media/mediaswipe.js',
            '/js/plugins/media/mediaswipe-loader.js',
            '/js/pages/search.js',
         ])->withFullUrl(); ?>

<?php $__env->stopSection(); ?>

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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-8 col-md-7 second p-0">
                <div class="d-flex neutral-bg fixed-top-m px-3 py-3 feed-mobile-search">
                    <span class="h-pill h-pill-primary rounded search-back-button d-flex justify-content-center align-items-center" onClick="Search.goBack()">
                        <?php echo $__env->make('elements.icon',['icon'=>'arrow-back-outline','variant'=>'medium','centered'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </span>
                    <div class="col pl-2">
                        <?php echo $__env->make('elements.search-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <?php if($activeFilter == 'people'): ?>
                        <span class="h-pill h-pill-primary rounded search-back-button d-flex justify-content-center align-items-center" data-toggle="collapse" href="#colappsableFilters" role="button" aria-expanded="false" aria-controls="colappsableFilters">
                             <?php echo $__env->make('elements.icon',['icon'=>'filter-outline','variant'=>'medium','centered'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="py-2 m-pt-70">
                    <?php if($activeFilter == 'people'): ?>
                        <div class="mobile-search-filter collapse <?php echo e($searchFilterExpanded ? 'show' : ''); ?>"  id="colappsableFilters">
                            <?php echo $__env->make('elements.search.search-filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endif; ?>
                    <div class="inline-border-tabs mt-3">
                        <nav class="nav nav-pills nav-justified bookmarks-nav">
                            <?php $__currentLoopData = $availableFilters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="nav-item nav-link <?php echo e($filter == $activeFilter ? 'active' : ''); ?>" href="<?php echo e(route('search.get',array_merge(['query'=>isset($searchTerm) && $searchTerm ? $searchTerm : ''],['filter'=>$filter]))); ?>">
                                    <div class="d-flex justify-content-center text-bold">
                                        <span class="d-md-none">
                                        <?php switch($filter):
                                                case ('live'): ?>
                                                <?php echo $__env->make('elements.icon',['icon'=>'play-outline','centered' => false,'variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php break; ?>
                                                <?php case ('top'): ?>
                                                <?php echo $__env->make('elements.icon',['icon'=>'flame-outline','centered' => false,'variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php break; ?>
                                                <?php case ('latest'): ?>
                                                <?php echo $__env->make('elements.icon',['icon'=>'time-outline','centered' => false,'variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php break; ?>
                                                <?php case ('people'): ?>
                                                <?php echo $__env->make('elements.icon',['icon'=>'people-outline','centered' => false,'variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php break; ?>
                                                <?php case ('photos'): ?>
                                                <?php echo $__env->make('elements.icon',['icon'=>'image-outline','centered' => false,'variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php break; ?>
                                                <?php case ('videos'): ?>
                                                <?php echo $__env->make('elements.icon',['icon'=>'videocam-outline','centered' => false,'variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php break; ?>
                                            <?php endswitch; ?>
                                            </span>
                                             <?php if($filter == 'live'): ?> <div class="blob red d-none d-md-block"></div> <?php endif; ?>
                                        <span class="d-none d-md-block ml-2"><?php echo e(ucfirst(trim( (in_array($filter,['videos','people']) ? trans_choice($filter,2,['number'=>'']) : __(ucfirst($filter))) ))); ?></span>
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </nav>
                    </div>
                </div>

                <?php echo $__env->make('elements.message-alert',['classes'=>'p-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php if(isset($posts)): ?>
                    <?php echo $__env->make('elements.feed.posts-load-more', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="feed-box mt-0 pt-2 posts-wrapper">
                        <?php echo $__env->make('elements.feed.posts-wrapper',['posts'=>$posts], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <?php echo $__env->make('elements.feed.posts-loading-spinner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>

                <?php if(isset($users)): ?>
                    <div class="users-box mt-4 users-wrapper">
                        <?php echo $__env->make('elements.search.users-wrapper',['posts'=>$users], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <?php echo $__env->make('elements.feed.posts-loading-spinner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>

                <?php if(isset($streams)): ?>
                    <div class="streams-box mt-4 streams-wrapper">
                        <?php echo $__env->make('elements.search.streams-wrapper',['streams'=>$streams], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <?php echo $__env->make('elements.feed.posts-loading-spinner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>

            </div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-4 first border-left order-0 pt-4 pb-5 min-vh-100 suggestions-wrapper d-none d-md-block">
                <div class="search-widgets">
                    <?php echo $__env->make('elements.feed.suggestions-box',['profiles'=>$suggestions,'isMobile' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php if(getSetting('custom-code-ads.sidebar_ad_spot')): ?>
                        <div class="mt-4">
                            <?php echo getSetting('custom-code-ads.sidebar_ad_spot'); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php echo $__env->make('elements.checkout.checkout-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user-no-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/pages/search.blade.php ENDPATH**/ ?>