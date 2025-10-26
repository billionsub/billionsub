<div class="side-menu sidebar-inverse">
    <nav class="navbar navbar-default" role="navigation">
        <div class="side-menu-container">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo e(route('voyager.dashboard')); ?>">
                    <div class="logo-icon-container">
                        <?php $admin_logo_img = Voyager::setting('admin.icon_image', ''); ?>
                        <?php if($admin_logo_img == ''): ?>
                            <img src="<?php echo e(asset('/img/rounded-logo-white.svg')); ?>" alt="Logo Icon">
                        <?php else: ?>
                            <img src="<?php echo e(Voyager::image($admin_logo_img)); ?>" alt="Logo Icon">
                        <?php endif; ?>
                    </div>
                    <div class="title"><?php echo e(Voyager::setting('admin.title', 'VOYAGER')); ?></div>
                </a>
            </div><!-- .navbar-header -->
        </div>
        <div id="adminmenu">
            <admin-menu :items="<?php echo e(menu('admin', '_json')); ?>"></admin-menu>
        </div>
    </nav>
</div>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/vendor/voyager/dashboard/sidebar.blade.php ENDPATH**/ ?>