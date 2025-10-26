<?php $__env->startSection('page_title',  __("user_profile_title_label",['user' => $user->name])); ?>
<?php $__env->startSection('share_url', route('profile',['username'=> $user->username])); ?>
<?php $__env->startSection('share_title',  __("user_profile_title_label",['user' => $user->name]) . ' - ' .  getSetting('site.name')); ?>
<?php $__env->startSection('share_description', $seo_description ?? getSetting('site.description')); ?>
<?php $__env->startSection('share_type', 'article'); ?>
<?php $__env->startSection('share_img', $user->cover); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo Minify::javascript(array_merge([
            '/js/PostsPaginator.js',
            '/js/CommentsPaginator.js',
            '/js/StreamsPaginator.js',
            '/js/Post.js',
            '/js/pages/profile.js',
            '/js/pages/lists.js',
            '/js/pages/checkout.js',
            '/libs/swiper/swiper-bundle.min.js',
            '/js/plugins/media/photoswipe.js',
            '/libs/photoswipe/dist/photoswipe-ui-default.min.js',
            '/js/plugins/media/mediaswipe.js',
            '/js/plugins/media/mediaswipe-loader.js',
            '/js/LoginModal.js',
            '/js/messenger/messenger.js',
         ],$additionalAssets))->withFullUrl(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <?php echo Minify::stylesheet([
            '/css/pages/profile.css',
            '/css/pages/checkout.css',
            '/css/pages/lists.css',
            '/libs/swiper/swiper-bundle.min.css',
            '/libs/photoswipe/dist/photoswipe.css',
            '/libs/photoswipe/dist/default-skin/default-skin.css',
            '/css/pages/profile.css',
            '/css/pages/lists.css',
            '/css/posts/post.css'
         ])->withFullUrl(); ?>

    <?php if(getSetting('feed.post_box_max_height')): ?>
        <?php echo $__env->make('elements.feed.fixed-height-feed-posts', ['height' => getSetting('feed.post_box_max_height')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
    <?php if(getSetting('security.recaptcha_enabled') && !Auth::check()): ?>
        <?php echo NoCaptcha::renderJs(); ?>

    <?php endif; ?>
    <?php if($activeFilter): ?>
        <link rel="canonical" href="<?php echo e(route('profile',['username'=> $user->username])); ?>" />
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="min-vh-100 col-12 col-md-8 border-right pr-md-0">

            <div class="">
                <div class="profile-cover-bg">
                    <img class="card-img-top centered-and-cropped" src="<?php echo e($user->cover); ?>">
                </div>
            </div>

            <div class="container d-flex justify-content-between align-items-center">
                <div class="z-index-3 avatar-holder">
                    <img src="<?php echo e($user->avatar); ?>" class="rounded-circle">
                </div>
                <div>
                    <?php if(!Auth::check() || Auth::user()->id !== $user->id): ?>
                        <div class="d-flex flex-row">
                            <?php if(Auth::check()): ?>
                                <div class="">
                                <span class="p-pill ml-2 pointer-cursor to-tooltip"
                                      <?php if(!Auth::user()->email_verified_at && getSetting('site.enforce_email_validation')): ?>
                                      data-placement="top"
                                      title="<?php echo e(__('Please verify your account')); ?>"
                                      <?php elseif(!\App\Providers\GenericHelperServiceProvider::creatorCanEarnMoney($user)): ?>
                                      data-placement="top"
                                      title="<?php echo e(__('This creator cannot earn money yet')); ?>"
                                      <?php else: ?>
                                      data-placement="top"
                                      title="<?php echo e(__('Send a tip')); ?>"
                                      data-toggle="modal"
                                      data-target="#checkout-center"
                                      data-type="tip"
                                      data-first-name="<?php echo e(Auth::user()->first_name); ?>"
                                      data-last-name="<?php echo e(Auth::user()->last_name); ?>"
                                      data-billing-address="<?php echo e(Auth::user()->billing_address); ?>"
                                      data-country="<?php echo e(Auth::user()->country); ?>"
                                      data-city="<?php echo e(Auth::user()->city); ?>"
                                      data-state="<?php echo e(Auth::user()->state); ?>"
                                      data-postcode="<?php echo e(Auth::user()->postcode); ?>"
                                      data-available-credit="<?php echo e(Auth::user()->wallet->total); ?>"
                                      data-username="<?php echo e($user->username); ?>"
                                      data-name="<?php echo e($user->name); ?>"
                                      data-avatar="<?php echo e($user->avatar); ?>"
                                      data-recipient-id="<?php echo e($user->id); ?>"
                                      <?php endif; ?>
                                >
                                 <?php echo $__env->make('elements.icon',['icon'=>'cash-outline'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </span>
                                </div>
                                <div class="">
                                    <?php if($hasSub || $viewerHasChatAccess): ?>
                                        <span class="p-pill ml-2 pointer-cursor" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Send a message')); ?>" onclick="messenger.showNewMessageDialog()">
                                            <?php echo $__env->make('elements.icon',['icon'=>'chatbubbles-outline'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </span>
                                    <?php else: ?>
                                        <span class="p-pill ml-2 pointer-cursor" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('DMs unavailable without subscription')); ?>">
                                        <?php echo $__env->make('elements.icon',['icon'=>'chatbubbles-outline'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <span class="p-pill ml-2 pointer-cursor" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Add to your lists')); ?>" onclick="Lists.showListAddModal();">
                                 <?php echo $__env->make('elements.icon',['icon'=>'list-outline'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </span>
                            <?php endif; ?>
                            <?php if(getSetting('profiles.allow_profile_qr_code')): ?>
                                <div>
                                    <span class="p-pill ml-2 pointer-cursor" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Get profile QR code')); ?>" onclick="Profile.getProfileQRCode()">
                                        <?php echo $__env->make('elements.icon',['icon'=>'qr-code-outline'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                            <span class="p-pill ml-2 pointer-cursor" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Copy profile link')); ?>" onclick="shareOrCopyLink()">
                                 <?php echo $__env->make('elements.icon',['icon'=>'share-social-outline'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </span>
                        </div>
                    <?php else: ?>
                        <div class="d-flex flex-row">
                            <div class="mr-2">
                                <a href="<?php echo e(route('my.settings')); ?>" class="p-pill p-pill-text ml-2 pointer-cursor">
                                    <?php echo $__env->make('elements.icon',['icon'=>'settings-outline','classes'=>'mr-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <span class="d-none d-md-block"><?php echo e(__('Edit profile')); ?></span>
                                    <span class="d-block d-md-none"><?php echo e(__('Edit')); ?></span>
                                </a>
                            </div>
                            <?php if(getSetting('profiles.allow_profile_qr_code')): ?>
                                <div>
                                    <span class="p-pill ml-2 pointer-cursor" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Get profile QR code')); ?>" onclick="Profile.getProfileQRCode()">
                                        <?php echo $__env->make('elements.icon',['icon'=>'qr-code-outline'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                            <div>
                                <span class="p-pill ml-2 pointer-cursor" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Copy profile link')); ?>" onclick="shareOrCopyLink()">
                                    <?php echo $__env->make('elements.icon',['icon'=>'share-social-outline'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="container pt-2 pl-0 pr-0">

                <div class="pt-2 pl-4 pr-4">
                    <h5 class="text-bold d-flex align-items-center">
                        <span><?php echo e($user->name); ?></span>
                        <?php if($user->email_verified_at && $user->birthdate && ($user->verification && $user->verification->status == 'verified')): ?>
                            <span data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Verified user')); ?>">
                                <?php echo $__env->make('elements.icon',['icon'=>'checkmark-circle-outline','centered'=>true,'classes'=>'ml-1 text-primary'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </span>
                        <?php endif; ?>
                        <?php if($hasActiveStream): ?>
                            <span data-toggle="tooltip" data-placement="right" title="<?php echo e(__('Live streaming')); ?>">
                            <div class="blob red ml-3"></div>
                            </span>
                        <?php endif; ?>
                    </h5>
                    <h6 class="text-muted"><span class="text-bold"><span>@</span><?php echo e($user->username); ?></span> </h6>
                </div>

                <div class="pt-2 pb-2 pl-4 pr-4 profile-description-holder">
                    <div class="description-content <?php echo e($user->bio && !getSetting('profiles.disable_profile_bio_excerpt') ? 'line-clamp-3' : ''); ?>">
                        <?php if($user->bio): ?>
                            <?php if(getSetting('profiles.allow_profile_bio_markdown')): ?>
                                <?php echo GenericHelper::parseProfileMarkdownBio($user->bio); ?>

                            <?php else: ?>
                                <?php echo GenericHelper::parseSafeHTML($user->bio); ?>

                            <?php endif; ?>
                        <?php else: ?>
                            <?php echo e(__('No description available.')); ?>

                        <?php endif; ?>
                    </div>
                    <?php if($user->bio && !getSetting('profiles.disable_profile_bio_excerpt')): ?>
                        <span class="text-primary pointer-cursor show-more-actions d-none" onclick="Profile.toggleFullDescription()">
                            <span class="label-more"><?php echo e(__('More info')); ?></span>
                            <span class="label-less d-none"><?php echo e(__('Show less')); ?></span>
                        </span>
                    <?php endif; ?>
                </div>

                <div class="d-flex flex-column flex-md-row justify-content-md-between pb-2 pl-4 pr-4 mb-3 mt-1">

                    <div class="d-flex align-items-center mr-2 text-truncate mb-0 mb-md-0">
                        <?php echo $__env->make('elements.icon',['icon'=>'calendar-clear-outline','centered'=>false,'classes'=>'mr-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="text-truncate ml-1">
                            <?php echo e(ucfirst($user->created_at->translatedFormat('F d'))); ?>

                        </div>
                    </div>
                    <?php if($user->location): ?>
                        <div class="d-flex align-items-center mr-2 text-truncate mb-0 mb-md-0">
                            <?php echo $__env->make('elements.icon',['icon'=>'location-outline','centered'=>false,'classes'=>'mr-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="text-truncate ml-1">
                                <?php echo e($user->location); ?>

                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(!getSetting('profiles.disable_website_link_on_profile')): ?>
                        <?php if($user->website): ?>
                            <div class="d-flex align-items-center mr-2 text-truncate mb-0 mb-md-0">
                                <?php echo $__env->make('elements.icon',['icon'=>'globe-outline','centered'=>false,'classes'=>'mr-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="text-truncate ml-1">
                                    <a href="<?php echo e($user->website); ?>" target="_blank" rel="nofollow">
                                        <?php echo e(str_replace(['https://','http://','www.'],'',$user->website)); ?>

                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if(getSetting('profiles.allow_gender_pronouns')): ?>
                        <?php if($user->gender_pronoun): ?>
                            <div class="d-flex align-items-center mr-2 text-truncate mb-0 mb-md-0">
                                <?php echo $__env->make('elements.icon',['icon'=>'male-female-outline','centered'=>false,'classes'=>'mr-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="text-truncate ml-1">
                                    <?php echo e($user->gender_pronoun); ?>

                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                </div>

                <div class="bg-separator border-top border-bottom"></div>

                <?php echo $__env->make('elements.message-alert',['classes'=>'px-2 pt-4'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if($user->paid_profile && (!getSetting('profiles.allow_users_enabling_open_profiles') || (getSetting('profiles.allow_users_enabling_open_profiles') && !$user->open_profile))): ?>
                    <?php if( (!Auth::check() || Auth::user()->id !== $user->id) && !$hasSub): ?>
                        <div class="p-4 subscription-holder">
                            <h6 class="font-weight-bold text-uppercase mb-3"><?php echo e(__('Subscription')); ?></h6>
                            <?php if(count($offer) && $offer['discountAmount']['30'] > 0): ?>
                                <h5 class="m-0 text-bold"><?php echo e(__('Limited offer main label',['discount'=> round($offer['discountAmount']['30']), 'days_remaining'=> $offer['daysRemaining'] ])); ?></h5>
                                <small class=""><?php echo e(__('Offer ends label',['date'=>$offer['expiresAt']->format('d M')])); ?></small>
                            <?php endif; ?>
                            <?php if($hasSub): ?>
                                <button class="btn btn-round btn-lg btn-primary btn-block mt-3 mb-2 text-center">
                                    <span><?php echo e(__('Subscribed')); ?></span>
                                </button>
                            <?php else: ?>

                                <?php if(Auth::check()): ?>
                                    <?php if(!GenericHelper::isEmailEnforcedAndValidated()): ?>
                                        <i><?php echo e(__('Your email address is not verified.')); ?> <a href="<?php echo e(route('verification.notice')); ?>"><?php echo e(__("Click here")); ?></a> <?php echo e(__("to re-send the confirmation email.")); ?></i>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <?php echo $__env->make('elements.checkout.subscribe-button-30', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="d-flex justify-content-between">
                                    <?php if($user->profile_access_price_6_months || $user->profile_access_price_12_months): ?>
                                        <small>
                                            <div class="pointer-cursor d-flex align-items-center" onclick="Profile.toggleBundles()">
                                                <div class="label-more"><?php echo e(__('Subscriptions bundles')); ?></div>
                                                <div class="label-less d-none"><?php echo e(__('Hide bundles')); ?></div>
                                                <div class="ml-1 label-icon">
                                                    <?php echo $__env->make('elements.icon',['icon'=>'chevron-down-outline','centered'=>false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                </div>
                                            </div>
                                        </small>
                                    <?php endif; ?>
                                    <?php if(count($offer) && $offer['discountAmount']['30'] > 0): ?>
                                        <small class=""><?php echo e(__('Regular price label',['currency'=> getSetting('payments.currency_code') ?? 'USD','amount'=>$user->offer->old_profile_access_price])); ?></small>
                                    <?php endif; ?>
                                </div>

                                <?php if($user->profile_access_price_6_months || $user->profile_access_price_12_months || $user->profile_access_price_3_months): ?>
                                    <div class="subscription-bundles d-none mt-4">
                                        <?php if($user->profile_access_price_3_months): ?>
                                            <?php echo $__env->make('elements.checkout.subscribe-button-90', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>

                                        <?php if($user->profile_access_price_6_months): ?>
                                            <?php echo $__env->make('elements.checkout.subscribe-button-182', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>

                                        <?php if($user->profile_access_price_12_months): ?>
                                            <?php echo $__env->make('elements.checkout.subscribe-button-365', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>

                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <div class="bg-separator border-top border-bottom"></div>
                    <?php endif; ?>
                <?php elseif(!Auth::check() || (Auth::check() && Auth::user()->id !== $user->id)): ?>
                    <div class=" p-4 subscription-holder">
                        <h6 class="font-weight-bold text-uppercase mb-3"><?php echo e(__('Follow this creator')); ?></h6>
                        <?php if(Auth::check()): ?>
                            <button class="btn btn-round btn-lg btn-primary btn-block mt-3 mb-0 manage-follow-button" onclick="Lists.manageFollowsAction('<?php echo e($user->id); ?>')">
                                <span class="manage-follows-text"><?php echo e(\App\Providers\ListsHelperServiceProvider::getUserFollowingType($user->id, true)); ?></span>
                            </button>
                        <?php else: ?>
                            <button class="btn btn-round btn-lg btn-primary btn-block mt-3 mb-0 text-center"
                                    data-toggle="modal"
                                    data-target="#login-dialog"
                            >
                                <span class=""><?php echo e(__('Follow')); ?></span>
                            </button>
                        <?php endif; ?>
                    </div>
                    <div class="bg-separator border-top border-bottom"></div>
                <?php endif; ?>
                <div class="mt-3 inline-border-tabs">
                    <nav class="nav nav-pills nav-justified text-bold">
                        <a class="nav-item nav-link <?php echo e($activeFilter == false ? 'active' : ''); ?>" href="<?php echo e(route('profile',['username'=> $user->username])); ?>"><?php echo e(trans_choice('posts', $posts->total(), ['number'=>$posts->total()])); ?> </a>

                        <?php if($filterTypeCounts['image'] > 0): ?>
                            <a class="nav-item nav-link <?php echo e($activeFilter == 'image' ? 'active' : ''); ?>" href="<?php echo e(route('profile',['username'=> $user->username]) . '?filter=image'); ?>"><?php echo e(trans_choice('images', $filterTypeCounts['image'], ['number'=>$filterTypeCounts['image']])); ?></a>
                        <?php endif; ?>

                        <?php if($filterTypeCounts['video'] > 0): ?>
                            <a class="nav-item nav-link <?php echo e($activeFilter == 'video' ? 'active' : ''); ?>" href="<?php echo e(route('profile',['username'=> $user->username]) . '?filter=video'); ?>"><?php echo e(trans_choice('videos', $filterTypeCounts['video'], ['number'=>$filterTypeCounts['video']])); ?></a>

                        <?php endif; ?>

                        <?php if($filterTypeCounts['audio'] > 0): ?>
                            <a class="nav-item nav-link <?php echo e($activeFilter == 'audio' ? 'active' : ''); ?>" href="<?php echo e(route('profile',['username'=> $user->username]) . '?filter=audio'); ?>"><?php echo e(trans_choice('audio', $filterTypeCounts['audio'], ['number'=>$filterTypeCounts['audio']])); ?></a>
                        <?php endif; ?>

                        <?php if(getSetting('streams.allow_streams')): ?>
                            <?php if(isset($filterTypeCounts['streams']) && $filterTypeCounts['streams'] > 0): ?>
                                <a class="nav-item nav-link <?php echo e($activeFilter == 'streams' ? 'active' : ''); ?>" href="<?php echo e(route('profile',['username'=> $user->username]) . '?filter=streams'); ?>"> <?php echo e($filterTypeCounts['streams']); ?> <?php echo e(trans_choice('streams', $filterTypeCounts['streams'], ['number'=>$filterTypeCounts['streams']])); ?></a>
                            <?php endif; ?>
                        <?php endif; ?>

                    </nav>
                </div>
                <div class="justify-content-center align-items-center <?php echo e((Cookie::get('app_feed_prev_page') && PostsHelper::isComingFromPostPage(request()->session()->get('_previous'))) ? 'mt-3' : 'mt-4'); ?>">
                    <?php if($activeFilter !== 'streams'): ?>
                        <?php echo $__env->make('elements.feed.posts-load-more', ['classes' => 'mb-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="feed-box mt-0 posts-wrapper">
                            <?php echo $__env->make('elements.feed.posts-wrapper',['posts'=>$posts], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php else: ?>
                        <div class="streams-box mt-4 streams-wrapper mb-4">
                            <?php echo $__env->make('elements.search.streams-wrapper',['streams'=>$streams,'showLiveIndicators'=>true, 'showUsername' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endif; ?>
                    <?php echo $__env->make('elements.feed.posts-loading-spinner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 d-none d-md-block pt-3">
            <?php echo $__env->make('elements.profile.widgets', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <div class="d-none">
        <ion-icon name="heart"></ion-icon>
        <ion-icon name="heart-outline"></ion-icon>
    </div>

    <?php if(Auth::check()): ?>
        <?php echo $__env->make('elements.lists.list-add-user-dialog',['user_id' => $user->id, 'lists' => ListsHelper::getUserLists()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('elements.checkout.checkout-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('elements.messenger.send-user-message',['receiver'=>$user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('elements.modal-login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php echo $__env->make('elements.profile.qr-code-dialog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user-no-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/pages/profile.blade.php ENDPATH**/ ?>