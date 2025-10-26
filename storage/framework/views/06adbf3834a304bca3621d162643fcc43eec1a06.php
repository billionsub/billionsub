<div class="mobile-bottom-nav border-top z-index-3 py-1 neutral-bg">
    <div class="d-flex justify-content-between w-100 py-2 px-2">
        <a href="<?php echo e(Auth::check() ? route('feed') : route('home')); ?>" class="h-pill h-pill-primary nav-link d-flex justify-content-between px-3 <?php echo e(Route::currentRouteName() == 'feed' ? 'active' : ''); ?>">
            <div class="d-flex justify-content-center align-items-center">
                <div class="icon-wrapper d-flex justify-content-center align-items-center">
                    <?php echo $__env->make('elements.icon',['icon'=>'home-outline','variant'=>'large'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </a>
        <?php if(Auth::check()): ?>
            <a href="<?php echo e(route('my.notifications')); ?>" class="h-pill h-pill-primary nav-link d-flex justify-content-between px-3 <?php echo e(Route::currentRouteName() == 'my.notifications' ? 'active' : ''); ?>">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="icon-wrapper d-flex justify-content-center align-items-center position-relative">
                        <?php echo $__env->make('elements.icon',['icon'=>'notifications-outline','variant'=>'large'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="menu-notification-badge notifications-menu-count <?php echo e((isset($notificationsCountOverride) && $notificationsCountOverride->total > 0 ) || (NotificationsHelper::getUnreadNotifications()->total > 0) ? '' : 'd-none'); ?>">
                            <?php echo e(!isset($notificationsCountOverride) ? NotificationsHelper::getUnreadNotifications()->total : $notificationsCountOverride->total); ?>

                        </div>
                    </div>
                </div>
            </a>
            <?php if(!getSetting('site.hide_create_post_menu')): ?>
                <?php if(GenericHelper::isEmailEnforcedAndValidated()): ?>
                    <a href="<?php echo e(route('posts.create')); ?>" class="h-pill h-pill-primary nav-link d-flex justify-content-between px-3 <?php echo e(Route::currentRouteName() == 'posts.create' ? 'active' : ''); ?>">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="icon-wrapper d-flex justify-content-center align-items-center">
                                <?php echo $__env->make('elements.icon',['icon'=>'add-circle-outline','variant'=>'large'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
            <a href="<?php echo e(route('my.messenger.get')); ?>" class="h-pill h-pill-primary nav-link d-flex justify-content-between px-3 <?php echo e(Route::currentRouteName() == 'my.messenger.get' ? 'active' : ''); ?>">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="icon-wrapper d-flex justify-content-center align-items-center position-relative">
                        <?php echo $__env->make('elements.icon',['icon'=>'chatbubble-outline','variant'=>'large'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="menu-notification-badge chat-menu-count <?php echo e((NotificationsHelper::getUnreadMessages() > 0) ? '' : 'd-none'); ?>">
                            <?php echo e(NotificationsHelper::getUnreadMessages()); ?>

                        </div>
                    </div>
                </div>
            </a>
        <?php endif; ?>
        <a href="javascript:void(0)" class="open-menu h-pill h-pill-primary nav-link d-flex justify-content-between px-3">
            <div class="d-flex justify-content-center align-items-center">
                <div class="icon-wrapper d-flex justify-content-center align-items-center">
                    <?php if(Auth::check()): ?>
                        <img src="<?php echo e(Auth::user()->avatar); ?>" class="rounded-circle user-avatar w-32">
                    <?php else: ?>
                        <div class="avatar-placeholder">
                            <?php echo $__env->make('elements.icon',['icon'=>'person-circle','variant'=>'large'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </a>
    </div>
</div>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/public_html/resources/views/elements/mobile-navbar.blade.php ENDPATH**/ ?>