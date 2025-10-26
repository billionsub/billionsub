<div class="post-box" data-postID="<?php echo e($post->id); ?>">
    <div class="post-header pl-3 pr-3 ">
        <div class="d-flex">
            <div class="avatar-wrapper">
                <img class="avatar rounded-circle" src="<?php echo e($post->user->avatar); ?>">
            </div>
            <div class="post-details pl-2 w-100<?php echo e($post->is_pinned ? '' : ''); ?>">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="text-bold"><a href="<?php echo e(route('profile',['username'=>$post->user->username])); ?>" class="text-dark-r"><?php echo e($post->user->name); ?></a></div>
                        <div><a href="<?php echo e(route('profile',['username'=>$post->user->username])); ?>" class="text-dark-r text-hover"><span>@</span><?php echo e($post->user->username); ?></a></div>
                    </div>

                    <div class="d-flex">

                        <?php if(Auth::check() && (($post->user_id === Auth::user()->id && $post->status == 0) || (Auth::user()->role_id === 1) && $post->status == 0) ): ?>
                            <div class="pr-3 pr-md-3"><span class="badge badge-pill bg-gradient-faded-secondary"><?php echo e(ucfirst(__("pending"))); ?></span></div>
                        <?php endif; ?>

                        <?php if($post->expire_date): ?>
                            <div class="pr-3 pr-md-3">
                                    <span class="badge badge-pill bg-gradient-faded-primary"  data-toggle="<?php echo e(!$post->is_expired ? 'tooltip' : ''); ?>" data-placement="bottom" title="<?php echo e(!$post->is_expired ? __('Expiring in') .''. \Carbon\Carbon::parse($post->expire_date)->diffForHumans(null,false,true) : ''); ?>">
                                        <?php echo e(!$post->is_expired ? ucfirst(__("Expiring")) : ucfirst(__("Expired"))); ?>

                                    </span>
                            </div>
                        <?php endif; ?>
                        <?php if(Auth::check() && $post->release_date && Auth::user()->id === $post->user_id && $post->is_scheduled): ?>
                            <?php if($post->release_date > \Carbon\Carbon::now()): ?>
                                <div class="pr-3 pr-md-3">
                                        <span class="badge badge-pill bg-gradient-faded-primary" data-toggle="<?php echo e($post->is_scheduled ? 'tooltip' : ''); ?>" data-placement="bottom" title="<?php echo e($post->is_scheduled ? __('Posting in') .''. \Carbon\Carbon::parse($post->release_date)->diffForHumans(null,false,true) : ''); ?>">
                                            <?php echo e(ucfirst(__("Scheduled"))); ?>

                                        </span>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if(Auth::check() && $post->user_id === Auth::user()->id && $post->price > 0): ?>
                            <div class="pr-3 pr-md-3"><span class="badge badge-pill bg-gradient-faded-primary"><?php echo e(ucfirst(__("PPV"))); ?></span></div>
                        <?php endif; ?>

                        <?php if(Auth::check() && $post->user_id === Auth::user()->id): ?>
                            <div class="pr-3 pr-md-3 pt-1 <?php echo e($post->is_pinned ? '' : 'd-none'); ?> pinned-post-label">
                            <span data-toggle="tooltip" data-placement="bottom" title="<?php echo e(__("Pinned post")); ?>">
                                <?php echo $__env->make('elements.icon',['icon'=>'pricetag-outline', 'classes' => 'text-primary'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </span>
                            </div>
                        <?php endif; ?>

                        <div class="pr-3 pr-md-3">
                            <a class="text-dark-r text-hover d-flex" onclick="PostsPaginator.goToPostPageKeepingNav(<?php echo e($post->id); ?>,<?php echo e($post->postPage); ?>,'<?php echo e(route('posts.get',['post_id'=>$post->id,'username'=>$post->user->username])); ?>')" href="javascript:void(0)">
                                <?php if($post->release_date): ?>
                                    <?php echo e(\Carbon\Carbon::parse($post->release_date)->diffForHumans(null,false,true)); ?>

                                <?php else: ?>
                                    <?php echo e($post->created_at->diffForHumans(null,false,true)); ?>

                                <?php endif; ?>
                            </a>
                        </div>

                        <div class="dropdown <?php echo e(GenericHelper::getSiteDirection() == 'rtl' ? 'dropright' : 'dropleft'); ?>">
                            <a class="btn btn-sm text-dark-r text-hover btn-outline-<?php echo e((Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme') == 'dark' ? 'dark' : 'light') : (Cookie::get('app_theme') == 'dark' ? 'dark' : 'light'))); ?> dropdown-toggle px-2 py-1 m-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <?php echo $__env->make('elements.icon',['icon'=>'ellipsis-horizontal-outline'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </a>
                            <div class="dropdown-menu">
                                <!-- Dropdown menu links -->
                                <a class="dropdown-item" href="javascript:void(0)" onclick="shareOrCopyLink('<?php echo e(route('posts.get',['post_id'=>$post->id,'username'=>$post->user->username])); ?>')"><?php echo e(__('Copy post link')); ?></a>
                                <?php if(Auth::check()): ?>

                                    
                                    <?php if($post->isSubbed): ?>
                                        <a class="dropdown-item bookmark-button <?php echo e(PostsHelper::isPostBookmarked($post->bookmarks) ? 'is-active' : ''); ?>" href="javascript:void(0);" onclick="Post.togglePostBookmark(<?php echo e($post->id); ?>);"><?php echo e(PostsHelper::isPostBookmarked($post->bookmarks) ? __('Remove the bookmark') : __('Bookmark this post')); ?> </a>

                                        <?php if(Auth::user()->id === $post->user_id): ?>
                                            <a class="dropdown-item pin-button <?php echo e($post->is_pinned ? 'is-active' : ''); ?>" href="javascript:void(0);" onclick="Post.togglePostPin(<?php echo e($post->id); ?>);"><?php echo e($post->is_pinned ? __('Un-pin post') : __('Pin this post')); ?> </a>
                                        <?php endif; ?>
                                        <?php if(Auth::check() && Auth::user()->id != $post->user->id): ?>
                                            <div class="dropdown-divider"></div>
                                            <?php if(ListsHelper::isUserFollowing(Auth::user()->id, $post->user->id)): ?>
                                                <a class="dropdown-item" href="javascript:void(0);" onclick="Lists.showListManagementConfirmation('<?php echo e('unfollow'); ?>', <?php echo e($post->user->id); ?>);"><?php echo e(__('Unfollow')); ?></a>
                                            <?php endif; ?>
                                            <a class="dropdown-item" href="javascript:void(0);" onclick="Lists.showListManagementConfirmation('<?php echo e('block'); ?>', <?php echo e($post->user->id); ?>);"><?php echo e(__('Block')); ?></a>
                                        <?php endif; ?>

                                    <?php endif; ?>

                                    <?php if(Auth::check() && Auth::user()->id != $post->user->id): ?>
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="Lists.showReportBox(<?php echo e($post->user->id); ?>,<?php echo e($post->id); ?>);"><?php echo e(__('Report')); ?></a>
                                    <?php endif; ?>


                                    <?php if(Auth::check() && Auth::user()->id == $post->user->id): ?>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo e(route('posts.edit',['post_id'=>$post->id])); ?>"><?php echo e(__('Edit post')); ?></a>
                                        <?php if(!getSetting('compliance.minimum_posts_deletion_limit') || (getSetting('compliance.minimum_posts_deletion_limit') > 0 && count($post->user->posts) > getSetting('compliance.minimum_posts_deletion_limit'))): ?>
                                            <a class="dropdown-item" href="javascript:void(0);" onclick="Post.confirmPostRemoval(<?php echo e($post->id); ?>);"><?php echo e(__('Delete post')); ?></a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="post-content mt-3 <?php echo e(count($post->attachments) ? "mb-3" : ""); ?> pl-3 pr-3">
        <div class="text-break post-content-data <?php echo e(getSetting('feed.enable_post_description_excerpts') ? 'line-clamp-3' : ''); ?>">
            <?php if(getSetting('feed.disable_posts_text_preview')): ?>
                <?php if($post->isSubbed || (getSetting('profiles.allow_users_enabling_open_profiles') && $post->user->open_profile)): ?>
                    <?php echo GenericHelper::parseSafeHTML($post->text); ?>

                <?php endif; ?>
            <?php else: ?>
                <?php echo GenericHelper::parseSafeHTML($post->text); ?>

            <?php endif; ?>
        </div>
        <?php if(getSetting('feed.enable_post_description_excerpts')): ?>
            <div class="text-primary pointer-cursor show-more-actions <?php echo e(count($post->attachments) ? "mb-3" : ""); ?> d-none" onclick="Post.toggleFullDescription(<?php echo e($post->id); ?>)">
                <span class="label-more"><?php echo e(__('Show more')); ?></span>
                <span class="label-less d-none"><?php echo e(__('Show less')); ?></span>
            </div>
        <?php endif; ?>
    </div>

    <?php if(count($post->attachments)): ?>
        <div class="post-media">
            <?php if($post->isSubbed || (getSetting('profiles.allow_users_enabling_open_profiles') && $post->user->open_profile)): ?>
                <?php if((Auth::check() && Auth::user()->id !== $post->user_id && $post->price > 0 && !PostsHelper::hasUserUnlockedPost($post->postPurchases)) || (!Auth::check() && $post->price > 0 )): ?>
                    <?php echo $__env->make('elements.feed.post-locked',['type'=>'post','post'=>$post], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php else: ?>
                    <?php if(count($post->attachments) > 1): ?>
                        <div class="swiper-container mySwiper pointer-cursor">
                            <div class="swiper-wrapper">
                                <?php $__currentLoopData = $post->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="swiper-slide">
                                        <?php echo $__env->make('elements.feed.post-box-media-wrapper',[
                                            'attachment' => $attachment,
                                            'isGallery' => true,
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="swiper-button swiper-button-next p-pill-white"><?php echo $__env->make('elements.icon',['icon'=>'chevron-forward-outline'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
                            <div class="swiper-button swiper-button-prev p-pill-white"><?php echo $__env->make('elements.icon',['icon'=>'chevron-back-outline'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
                            <div class="swiper-pagination"></div>
                        </div>
                    <?php else: ?>
                        <?php echo $__env->make('elements.feed.post-box-media-wrapper',[
                            'attachment' => $post->attachments[0],
                            'isGallery' => false,
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                <?php endif; ?>
            <?php else: ?>
                <?php echo $__env->make('elements.feed.post-locked',['type'=>'subscription',], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <div class="post-footer mt-3 pl-3 pr-3">
        <div class="footer-actions d-flex justify-content-between">
            <div class="d-flex">
                
                <?php if($post->isSubbed || (Auth::check() && getSetting('profiles.allow_users_enabling_open_profiles') && $post->user->open_profile)): ?>
                    <div class="h-pill h-pill-primary mr-1 rounded react-button <?php echo e(PostsHelper::didUserReact($post->reactions) ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Like')); ?>" onclick="Post.reactTo('post',<?php echo e($post->id); ?>)">
                        <?php if(PostsHelper::didUserReact($post->reactions)): ?>
                            <?php echo $__env->make('elements.icon',['icon'=>'heart', 'variant' => 'medium', 'classes' =>"text-primary"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php else: ?>
                            <?php echo $__env->make('elements.icon',['icon'=>'heart-outline', 'variant' => 'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <div class="h-pill h-pill-primary mr-1 rounded react-button disabled">
                        <?php echo $__env->make('elements.icon',['icon'=>'heart-outline', 'variant' => 'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endif; ?>
                
                <?php if(Route::currentRouteName() != 'posts.get'): ?>
                    <?php if($post->isSubbed || (Auth::check() && getSetting('profiles.allow_users_enabling_open_profiles') && $post->user->open_profile)): ?>
                        <div class="h-pill h-pill-primary mr-1 rounded" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Show comments')); ?>" onClick="Post.showPostComments(<?php echo e($post->id); ?>,6)">
                            <?php echo $__env->make('elements.icon',['icon'=>'chatbubble-outline', 'variant' => 'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php else: ?>
                        <div class="h-pill h-pill-primary mr-1 disabled rounded">
                            <?php echo $__env->make('elements.icon',['icon'=>'chatbubble-outline', 'variant' => 'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                
                <?php if(Auth::check() && $post->user->id != Auth::user()->id): ?>
                    <?php if($post->isSubbed || (getSetting('profiles.allow_users_enabling_open_profiles') && $post->user->open_profile)): ?>
                        <div class="h-pill h-pill-primary send-a-tip to-tooltip poi <?php echo e((!GenericHelper::creatorCanEarnMoney($post->user)) ? 'disabled' : ''); ?>"
                             <?php if(!GenericHelper::creatorCanEarnMoney($post->user)): ?>
                             data-placement="top"
                             title="<?php echo e(__('This creator cannot earn money yet')); ?>">
                            <?php else: ?>
                                data-toggle="modal"
                                data-target="#checkout-center"
                                data-post-id="<?php echo e($post->id); ?>"
                                data-type="tip"
                                data-first-name="<?php echo e(Auth::user()->first_name); ?>"
                                data-last-name="<?php echo e(Auth::user()->last_name); ?>"
                                data-billing-address="<?php echo e(Auth::user()->billing_address); ?>"
                                data-country="<?php echo e(Auth::user()->country); ?>"
                                data-city="<?php echo e(Auth::user()->city); ?>"
                                data-state="<?php echo e(Auth::user()->state); ?>"
                                data-postcode="<?php echo e(Auth::user()->postcode); ?>"
                                data-available-credit="<?php echo e(Auth::user()->wallet->total); ?>"
                                data-username="<?php echo e($post->user->username); ?>"
                                data-name="<?php echo e($post->user->name); ?>"
                                data-avatar="<?php echo e($post->user->avatar); ?>"
                                data-recipient-id="<?php echo e($post->user_id); ?>">
                            <?php endif; ?>
                            <div class=" d-flex align-items-center">
                                <?php echo $__env->make('elements.icon',['icon'=>'gift-outline', 'variant' => 'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="ml-1 d-none d-lg-block"> <?php echo e(__('Send a tip')); ?> </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="h-pill h-pill-primary send-a-tip disabled">
                            <div class=" d-flex align-items-center">
                                <?php echo $__env->make('elements.icon',['icon'=>'gift-outline', 'variant' => 'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="ml-1 d-none d-md-block"> <?php echo e(__('Send a tip')); ?> </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="mt-0 d-flex align-items-center justify-content-center post-count-details">
                <span class="ml-2-h">
                    <strong class="text-bold post-reactions-label-count"><?php echo e(count($post->reactions)); ?></strong>
                    <span class="post-reactions-label"><?php echo e(trans_choice('likes', count($post->reactions))); ?></span>
                </span>
                <?php if($post->isSubbed || (Auth::check() && getSetting('profiles.allow_users_enabling_open_profiles') && $post->user->open_profile)): ?>
                    <span class="ml-2-h d-none d-lg-block">
                    <a href="<?php echo e(Route::currentRouteName() != 'posts.get' ? route('posts.get',['post_id'=>$post->id,'username'=>$post->user->username]) : '#comments'); ?>" class="text-dark-r text-hover">
                        <strong class="post-comments-label-count"><?php echo e(count($post->comments)); ?></strong>
                       <span class="post-comments-label">
                        <?php echo e(trans_choice('comments',  count($post->comments))); ?>

                       </span>
                    </a>
                </span>
                <?php else: ?>
                    <span class="ml-2-h d-none d-lg-block">
                        <strong class="post-comments-label-count"><?php echo e(count($post->comments)); ?></strong>
                       <span class="post-comments-label">
                        <?php echo e(trans_choice('comments',  count($post->comments))); ?>

                       </span>
                </span>
                <?php endif; ?>
                <span class="ml-2-h d-none d-lg-block">
                    <strong class="post-tips-label-count"><?php echo e($post->tips_count); ?></strong>
                    <span class="post-tips-label"><?php echo e(trans_choice('tips',$post->tips_count)); ?></span>
                </span>
            </div>
        </div>
    </div>

    <?php if($post->isSubbed || (Auth::check() && getSetting('profiles.allow_users_enabling_open_profiles') && $post->user->open_profile)): ?>
        <div class="post-comments d-none" <?php echo e(Route::currentRouteName() == 'posts.get' ? 'id="comments"' : ''); ?>>
            <hr>

            <div class="px-3 post-comments-wrapper">
                <div class="comments-loading-box">
                    <?php echo $__env->make('elements.preloading.messenger-contact-box',['limit'=>1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <div class="show-all-comments-label pl-3 d-none">
                <?php if(Route::currentRouteName() != 'posts.get'): ?>
                    <a href="javascript:void(0)" onclick="PostsPaginator.goToPostPageKeepingNav(<?php echo e($post->id); ?>,<?php echo e($post->postPage); ?>,'<?php echo e(route('posts.get',['post_id'=>$post->id,'username'=>$post->user->username])); ?>')"><?php echo e(__('Show more')); ?></a>
                <?php else: ?>
                    <a onClick="CommentsPaginator.loadResults(<?php echo e($post->id); ?>);" href="javascript:void(0);"><?php echo e(__('Show more')); ?></a>
                <?php endif; ?>
            </div>
            <div class="no-comments-label pl-3 d-none">
                <?php echo e(__('No comments yet.')); ?>

            </div>
            <?php if(Auth::check()): ?>
                <hr>
                <?php echo $__env->make('elements.feed.post-new-comment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>

</div>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/feed/post-box.blade.php ENDPATH**/ ?>