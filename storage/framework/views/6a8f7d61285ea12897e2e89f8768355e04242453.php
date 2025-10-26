<nav class="sidebar <?php echo e((Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme') == 'dark' ? '' : 'light') : (Cookie::get('app_theme') == 'dark' ? '' : 'light'))); ?>">

    <!-- close sidebar menu -->
    <div class="col-12 pb-1">
        <div class="dismiss d-flex justify-content-center align-items-center flex-row">
            <?php echo $__env->make('elements.icon',['icon'=>'arrow-back','variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <div class="col-12 sidebar-wrapper">

        <div class="mb-4 d-flex flex-row-no-rtl">
            <div>
                <?php if(Auth::check()): ?>
                    <img src="<?php echo e(Auth::user()->avatar); ?>" class="rounded-circle user-avatar">
                <?php else: ?>
                    <div class="avatar-placeholder">
                        <?php echo $__env->make('elements.icon',['icon'=>'person-circle','variant'=>'xlarge'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="pl-2 d-flex justify-content-center flex-column">
                <?php if(Auth::check()): ?>
                    <div class=""><span class=""><span>@</span><?php echo e(Auth::check() ? Auth::user()->username : '@username'); ?></span></div>
                    <small class="p-0 m-0"><?php echo e(trans_choice('fans', Auth::user()->fansCount, ['number'=> count(ListsHelper::getUserFollowers(Auth::user()->id))])); ?> - <?php echo e(trans_choice('following', Auth::user()->followingCount, ['number'=>Auth::user()->followingCount])); ?></small>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <ul class="list-unstyled menu-elements p-0">
        <?php if(GenericHelper::isEmailEnforcedAndValidated()): ?>
            <li class="<?php echo e(Route::currentRouteName() == 'profile' && (request()->route("username") == Auth::user()->username) ? 'active' : ''); ?>">
                <a class="scroll-link d-flex align-items-center" href="<?php echo e(route('profile',['username'=>Auth::user()->username])); ?>">
                    <?php echo $__env->make('elements.icon',['icon'=>'person-circle-outline','variant'=>'medium','centered'=>false,'classes'=>'mr-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo e(__('My profile')); ?></a>
            </li>
            <?php if(getSetting('streams.allow_streams')): ?>
                <li class="<?php echo e(in_array(Route::currentRouteName(), ['my.streams.get', 'public.stream.get', 'public.vod.get']) ? 'active' : ''); ?>">
                    <a class="scroll-link d-flex align-items-center" href="<?php echo e(route('my.streams.get')); ?>">
                        <?php echo $__env->make('elements.icon',['icon'=>'play-circle-outline','variant'=>'medium','centered'=>false,'classes'=>'mr-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo e(__('Streams')); ?></a>
                </li>
            <?php endif; ?>
            <li class="<?php echo e(Route::currentRouteName() == 'my.bookmarks' ? 'active' : ''); ?>">
                <a class="scroll-link d-flex align-items-center" href="<?php echo e(route('my.bookmarks')); ?>">
                    <?php echo $__env->make('elements.icon',['icon'=>'bookmarks-outline','variant'=>'medium','centered'=>false,'classes'=>'mr-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo e(__('Bookmarks')); ?></a>
            </li>
            <li class="<?php echo e(Route::currentRouteName() == 'my.lists.all' ? 'active' : ''); ?>">
                <a class="scroll-link d-flex align-items-center" href="<?php echo e(route('my.lists.all')); ?>">
                    <?php echo $__env->make('elements.icon',['icon'=>'list','variant'=>'medium','centered'=>false,'classes'=>'mr-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo e(__('Lists')); ?></a>
            </li>
            <li class="<?php echo e(Route::currentRouteName() == 'my.settings' ? 'active' : ''); ?>">
                <a class="scroll-link d-flex align-items-center" href="<?php echo e(route('my.settings')); ?>">
                    <?php echo $__env->make('elements.icon',['icon'=>'settings-outline','variant'=>'medium','centered'=>false,'classes'=>'mr-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo e(__('Settings')); ?></a>
            </li>
            <div class="menu-divider"></div>
        <?php endif; ?>
        <li>
            <a class="scroll-link d-flex align-items-center" href="<?php echo e(route('pages.get',['slug'=>'help'])); ?>">
                <?php echo $__env->make('elements.icon',['icon'=>'help-circle-outline','variant'=>'medium','centered'=>false,'classes'=>'mr-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo e(__('Help and support')); ?></a>
        </li>
        <?php if(getSetting('site.allow_theme_switch')): ?>
            <li>
                <a class="scroll-link d-flex align-items-center dark-mode-switcher" href="#">
                    <?php if(Cookie::get('app_theme') == 'dark' || (!Cookie::get('app_theme') && getSetting('site.default_user_theme') == 'dark')): ?>
                    <?php echo $__env->make('elements.icon',['icon'=>'contrast-outline','variant'=>'medium','centered'=>false,'classes'=>'mr-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo e(__('Light mode')); ?>

                    <?php else: ?>
                        <?php echo $__env->make('elements.icon',['icon'=>'contrast','variant'=>'medium','centered'=>false,'classes'=>'mr-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo e(__('Dark mode')); ?>

                    <?php endif; ?>
                </a>
            </li>
        <?php endif; ?>
        <?php if(getSetting('site.allow_direction_switch')): ?>
            <li>
                <a class="scroll-link d-flex align-items-center rtl-mode-switcher" href="#">
                    <?php echo $__env->make('elements.icon',['icon'=>'return-up-back','variant'=>'medium','centered'=>false,'classes'=>'mr-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo e(__("RTL")); ?></a>
            </li>
        <?php endif; ?>
        <?php if(getSetting('site.allow_language_switch')): ?>
            <li>
                <a href="#otherSections" class="d-flex align-items-center" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" role="button" aria-controls="otherSections">
                    <?php echo $__env->make('elements.icon',['icon'=>'language','variant'=>'medium','centered'=>false,'classes'=>'mr-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo e(__('Language')); ?>

                </a>
                <ul class="collapse list-unstyled" id="otherSections">
                    <?php $__currentLoopData = LocalesHelper::getAvailableLanguages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $languageCode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(LocalesHelper::getLanguageName($languageCode)): ?>
                            <li>
                                <a class="scroll-link d-flex align-items-center" href="<?php echo e(route('language',['locale' => $languageCode])); ?>"><?php echo e(ucfirst(__(LocalesHelper::getLanguageName($languageCode)))); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li>
        <?php endif; ?>
        <div class="menu-divider"></div>
        <li>
            <?php if(Auth::check()): ?>
                <a class="scroll-link d-flex align-items-center pointer-cursor" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <?php echo $__env->make('elements.icon',['icon'=>'log-out-outline','variant'=>'medium','centered'=>false,'classes'=>'mr-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo e(__('Log out')); ?>

                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                </form>
            <?php else: ?>
                <a class="scroll-link d-flex align-items-center" href="<?php echo e(route('login')); ?>">
                    <?php echo $__env->make('elements.icon',['icon'=>'log-in-outline','variant'=>'medium','centered'=>false,'classes'=>'mr-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </i> <?php echo e(__('Login')); ?></a>
            <?php endif; ?>
        </li>
    </ul>
</nav>

<!-- Dark overlay -->
<div class="overlay"></div>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/public_html/resources/views/template/user-side-menu.blade.php ENDPATH**/ ?>