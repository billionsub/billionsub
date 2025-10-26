<nav class="navbar navbar-expand-md <?php echo e((Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme') == 'dark' ? 'navbar-dark bg-dark' : 'navbar-light bg-white') : (Cookie::get('app_theme') == 'dark' ? 'navbar-dark bg-dark' : 'navbar-light bg-white'))); ?> shadow-sm ">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
            <img src="<?php echo e(asset( (Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme') == 'dark' ? getSetting('site.dark_logo') : getSetting('site.light_logo')) : (Cookie::get('app_theme') == 'dark' ? getSetting('site.dark_logo') : getSetting('site.light_logo'))) )); ?>" class="d-inline-block align-top mr-1 ml-3" alt="<?php echo e(__("Site logo")); ?>">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>" >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse pl-3 pl-md-0" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <?php if(Auth::check()): ?>
                    <?php if(!getSetting('site.hide_create_post_menu')): ?>
                        <li class="nav-item">
                            <a class="nav-link ml-0 ml-md-2" href="<?php echo e(route('posts.create')); ?>"><?php echo e(__('Create')); ?></a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link ml-0 ml-md-2" href="<?php echo e(route('feed')); ?>"><?php echo e(__('Feed')); ?></a>
                    </li>
                <?php endif; ?>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <?php if(auth()->guard()->guest()): ?>
                    <?php if(Route::currentRouteName() !== 'profile'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                        </li>
                        <?php if(Route::has('register')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php else: ?>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-right text-truncate d-flex align-items-center" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="text-truncate max-width-150"><?php echo e(Auth::user()->name); ?></div> <img src="<?php echo e(Auth::user()->avatar); ?>" class="rounded-circle home-user-avatar">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo e(route('feed')); ?>">
                                <?php echo e(__('Feed')); ?>

                            </a>
                            <a class="dropdown-item" href="<?php echo e(route('my.settings')); ?>">
                                <?php echo e(__('Settings')); ?>

                            </a>
                            <a class="dropdown-item" href="<?php echo e(route('profile',['username'=>Auth::user()->username])); ?>">
                                <?php echo e(__('Profile')); ?>

                            </a>
                            <a class="dropdown-item" href="<?php echo e(route('my.settings',['type'=>'subscriptions'])); ?>">
                                <?php echo e(__('Subscriptions')); ?>

                            </a>
                            <a class="dropdown-item" href="<?php echo e(route('my.settings',['type'=>'payments'])); ?>">
                                <?php echo e(__('Payments')); ?>

                            </a>
                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <?php echo e(__('Logout')); ?>

                            </a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/template/header.blade.php ENDPATH**/ ?>