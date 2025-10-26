<div class="side-menu px-1 px-md-2 px-lg-3">
    <div class="user-details mb-4 d-flex open-menu pointer-cursor flex-row-no-rtl">
        <div class="ml-0 ml-md-2">
            <?php if(Auth::check()): ?>
                <img src="<?php echo e(Auth::user()->avatar); ?>" class="rounded-circle user-avatar">
            <?php else: ?>
                <div class="avatar-placeholder">
                    <?php echo $__env->make('elements.icon',['icon'=>'person-circle','variant'=>'xlarge text-muted'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endif; ?>
        </div>
        <?php if(Auth::check()): ?>
            <div class="d-none d-lg-block overflow-hidden">
                <div class="pl-2 d-flex justify-content-center flex-column overflow-hidden">
                    <div class="ml-2 d-flex flex-column overflow-hidden">
                        <span class="text-bold text-truncate <?php echo e((Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme') == 'dark' ? '' : 'text-dark-r') : (Cookie::get('app_theme') == 'dark' ? '' : 'text-dark-r'))); ?>"><?php echo e(Auth::user()->name); ?></span>
                        <span class="text-muted"><span>@</span><?php echo e(Auth::user()->username); ?></span>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <ul class="nav flex-column user-side-menu">
        <li class="nav-item ">
            <a href="<?php echo e(Auth::check() ? route('feed') : route('home')); ?>" class="h-pill h-pill-primary nav-link <?php echo e(Route::currentRouteName() == 'feed' ? 'active' : ''); ?> d-flex justify-content-between">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="icon-wrapper d-flex justify-content-center align-items-center">
                        <?php echo $__env->make('elements.icon',['icon'=>'home-outline','variant'=>'large'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <span class="d-none d-md-block d-xl-block d-lg-block ml-2 text-truncate side-menu-label"><?php echo e(__('Home')); ?></span>
                </div>
            </a>
        </li>
        <?php if(GenericHelper::isEmailEnforcedAndValidated()): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('my.notifications')); ?>" class="nav-link h-pill h-pill-primary <?php echo e(Route::currentRouteName() == 'my.notifications' ? 'active' : ''); ?> d-flex justify-content-between">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="icon-wrapper d-flex justify-content-center align-items-center position-relative">
                            <?php echo $__env->make('elements.icon',['icon'=>'notifications-outline','variant'=>'large'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="menu-notification-badge notifications-menu-count <?php echo e((isset($notificationsCountOverride) && $notificationsCountOverride->total > 0 ) || (NotificationsHelper::getUnreadNotifications()->total > 0) ? '' : 'd-none'); ?>">
                                <?php echo e(!isset($notificationsCountOverride) ? NotificationsHelper::getUnreadNotifications()->total : $notificationsCountOverride->total); ?>

                            </div>
                        </div>
                        <span class="d-none d-md-block d-xl-block d-lg-block ml-2 text-truncate side-menu-label"><?php echo e(__('Notifications')); ?></span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('my.messenger.get')); ?>" class="nav-link <?php echo e(Route::currentRouteName() == 'my.messenger.get' ? 'active' : ''); ?> h-pill h-pill-primary d-flex justify-content-between">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="icon-wrapper d-flex justify-content-center align-items-center position-relative">
                            <?php echo $__env->make('elements.icon',['icon'=>'chatbubble-outline','variant'=>'large'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="menu-notification-badge chat-menu-count <?php echo e((NotificationsHelper::getUnreadMessages() > 0) ? '' : 'd-none'); ?>">
                                <?php echo e(NotificationsHelper::getUnreadMessages()); ?>

                            </div>
                        </div>
                        <span class="d-none d-md-block d-xl-block d-lg-block ml-2 text-truncate side-menu-label"><?php echo e(__('Messages')); ?></span>
                    </div>
                </a>
            </li>
            <?php if(getSetting('streams.allow_streams')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('search.get')); ?>?filter=live" class="nav-link <?php echo e(Route::currentRouteName() == 'search.get' && request()->get('filter') == 'live' ? 'active' : ''); ?> h-pill h-pill-primary d-flex justify-content-between">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="icon-wrapper d-flex justify-content-center align-items-center position-relative">
                                <?php echo $__env->make('elements.icon',['icon'=>'play-circle-outline','variant'=>'large'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="menu-notification-badge streams-menu-count <?php echo e((StreamsHelper::getPublicLiveStreamsCount() > 0) ? '' : 'd-none'); ?>">
                                    <?php echo e(StreamsHelper::getPublicLiveStreamsCount()); ?>

                                </div>
                            </div>
                            <span class="d-none d-md-block d-xl-block d-lg-block ml-2 text-truncate side-menu-label"><?php echo e(__('Streams')); ?></span>
                        </div>

                    </a>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a href="<?php echo e(route('my.bookmarks')); ?>" class="nav-link <?php echo e(Route::currentRouteName() == 'my.bookmarks' ? 'active' : ''); ?> h-pill h-pill-primary d-flex justify-content-between">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="icon-wrapper d-flex justify-content-center align-items-center">
                            <?php echo $__env->make('elements.icon',['icon'=>'bookmark-outline','variant'=>'large'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <span class="d-none d-md-block d-xl-block d-lg-block ml-2 text-truncate side-menu-label"><?php echo e(__('Bookmarks')); ?></span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('my.lists.all')); ?>" class="nav-link <?php echo e(Route::currentRouteName() == 'my.lists.all' ? 'active' : ''); ?> h-pill h-pill-primary d-flex justify-content-between">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="icon-wrapper d-flex justify-content-center align-items-center">
                            <?php echo $__env->make('elements.icon',['icon'=>'list-outline','variant'=>'large'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <span class="d-none d-md-block d-xl-block d-lg-block ml-2 text-truncate side-menu-label"><?php echo e(__('Lists')); ?></span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('my.settings',['type'=>'subscriptions'])); ?>" class="nav-link <?php echo e(Route::currentRouteName() == 'my.settings' &&  is_int(strpos(Request::path(),'subscriptions')) ? 'active' : ''); ?> h-pill h-pill-primary d-flex justify-content-between">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="icon-wrapper d-flex justify-content-center align-items-center">
                            <?php echo $__env->make('elements.icon',['icon'=>'people-circle-outline','variant'=>'large'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <span class="d-none d-md-block d-xl-block d-lg-block ml-2 text-truncate side-menu-label"><?php echo e(__('Subscriptions')); ?></span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('profile',['username'=>Auth::user()->username])); ?>" class="nav-link <?php echo e(Route::currentRouteName() == 'profile' && (request()->route("username") == Auth::user()->username) ? 'active' : ''); ?> h-pill h-pill-primary d-flex justify-content-between">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="icon-wrapper d-flex justify-content-center align-items-center">
                            <?php echo $__env->make('elements.icon',['icon'=>'person-circle-outline','variant'=>'large'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <span class="d-none d-md-block d-xl-block d-lg-block ml-2 text-truncate side-menu-label"><?php echo e(__('My profile')); ?></span>
                    </div>
                </a>
            </li>
        <?php endif; ?>

        <?php if(!Auth::check()): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('search.get')); ?>" class="nav-link <?php echo e(Route::currentRouteName() == 'search.get' ? 'active' : ''); ?> h-pill h-pill-primary d-flex justify-content-between">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="icon-wrapper d-flex justify-content-center align-items-center">
                            <?php echo $__env->make('elements.icon',['icon'=>'compass-outline','variant'=>'large'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <span class="d-none d-md-block d-xl-block d-lg-block ml-2 text-truncate side-menu-label"><?php echo e(__('Explore')); ?></span>
                    </div>
                </a>
            </li>
        <?php endif; ?>

        <li class="nav-item">
            <a href="#" role="button" class="open-menu nav-link h-pill h-pill-primary text-muted d-flex justify-content-between">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="icon-wrapper d-flex justify-content-center align-items-center">
                        <?php echo $__env->make('elements.icon',['icon'=>'ellipsis-horizontal-circle-outline','variant'=>'large'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <span class="d-none d-md-block d-xl-block d-lg-block ml-2 text-truncate side-menu-label"><?php echo e(__('More')); ?></span>
                </div>
            </a>
        </li>

        <?php if(GenericHelper::isEmailEnforcedAndValidated()): ?>
            <?php if(getSetting('streams.allow_streams') && !getSetting('site.hide_stream_create_menu')): ?>
                <li class="nav-item-live mt-2 mb-0">
                    <a role="button" class="btn btn-round btn-outline-danger btn-block px-3" href="<?php echo e(route('my.streams.get')); ?><?php echo e(StreamsHelper::getUserInProgressStream() ? '' : ( !GenericHelper::isUserVerified() && getSetting('site.enforce_user_identity_checks') ? '' : '?action=create')); ?>">
                        <div class="d-none d-md-flex d-xl-flex d-lg-flex justify-content-center align-items-center ml-1 text-truncate new-post-label">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <div class="stream-on-label w-100 <?php echo e(StreamsHelper::getUserInProgressStream() ? '' : 'd-none'); ?>">
                                    <div class="d-flex align-items-center w-100">
                                        <div class="mr-4"><div class="blob red"></div></div>
                                        <div class="ml-1"><?php echo e(__('On air')); ?> </div>
                                    </div>
                                </div>
                                <div class="stream-off-label w-100 <?php echo e(StreamsHelper::getUserInProgressStream() ? 'd-none' : ''); ?>">
                                    <div class="d-flex  align-items-center w-100">
                                        <div class="mr-3"> <?php echo $__env->make('elements.icon',['icon'=>'ellipse','variant'=>'','classes'=>'flex-shrink-0 text-danger'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
                                        <div class="ml-1"><?php echo e(__('Go live')); ?> </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="d-block d-md-none d-flex align-items-center justify-content-center"><?php echo $__env->make('elements.icon',['icon'=>'add-circle-outline','variant'=>'medium','classes'=>'flex-shrink-0'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
                    </a>
                </li>
            <?php endif; ?>
        <?php endif; ?>

        <?php if(!getSetting('site.hide_create_post_menu')): ?>
            <?php if(GenericHelper::isEmailEnforcedAndValidated()): ?>
                <li class="nav-item">
                    <a role="button" class="btn btn-round btn-primary btn-block " href="<?php echo e(route('posts.create')); ?>">
                        <span class="d-none d-md-block d-xl-block d-lg-block ml-2 text-truncate new-post-label"><?php echo e(__('New post')); ?></span>
                        <span class="d-block d-md-none d-flex align-items-center justify-content-center"><?php echo $__env->make('elements.icon',['icon'=>'add-circle-outline','variant'=>'medium','classes'=>'flex-shrink-0'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></span>
                    </a>
                </li>
            <?php endif; ?>
        <?php endif; ?>


    </ul>
</div>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/template/side-menu.blade.php ENDPATH**/ ?>