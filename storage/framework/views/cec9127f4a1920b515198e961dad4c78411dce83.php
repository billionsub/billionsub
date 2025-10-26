<footer class="d-none d-md-block">
    <!-- A grey container -->
    <div class="greycontainer">
        <!-- A black container -->
        <div class="blackcontainer">
            <!-- Container to indent the content -->
            <div class="container">
                <div class="copyRightInfo d-flex flex-column-reverse flex-md-row d-md-flex justify-content-md-between py-3">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">&copy; <?php echo e(date('Y')); ?> <?php echo e(getSetting('site.name')); ?>. <?php echo e(__('All rights reserved.')); ?></p>
                    </div>
                    <div class="d-flex align-items-center">
                        <ul class="d-flex flex-row nav mb-0 footer-social-links">
                            <?php if(getSetting('social-links.facebook_url')): ?>
                                <li class="nav-item">
                                    <a class="nav-link pe-1 ml-2" href="<?php echo e(getSetting('social-links.facebook_url')); ?>" target="_blank">
                                        <?php echo $__env->make('elements.icon',['icon'=>'logo-facebook','variant'=>'medium','classes' => 'text-lg opacity-8'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(getSetting('social-links.twitter_url')): ?>
                                <li class="nav-item">
                                    <a class="nav-link pe-1 ml-2" href="<?php echo e(getSetting('social-links.twitter_url')); ?>" target="_blank">
                                        <?php echo $__env->make('elements.icon',['icon'=>'logo-twitter','variant'=>'medium','classes' => 'text-lg opacity-8'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(getSetting('social-links.instagram_url')): ?>
                                <li class="nav-item">
                                    <a class="nav-link pe-1 ml-2" href="<?php echo e(getSetting('social-links.instagram_url')); ?>" target="_blank">
                                        <?php echo $__env->make('elements.icon',['icon'=>'logo-instagram','variant'=>'medium','classes' => 'text-lg opacity-8'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(getSetting('social-links.whatsapp_url')): ?>
                                <li class="nav-item">
                                    <a class="nav-link pe-1 ml-2" href="<?php echo e(getSetting('social-links.whatsapp_url')); ?>" target="_blank">
                                        <?php echo $__env->make('elements.icon',['icon'=>'logo-whatsapp','variant'=>'medium','classes' => 'text-lg opacity-8'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(getSetting('social-links.tiktok_url')): ?>
                                <li class="nav-item">
                                    <a class="nav-link pe-1 ml-2" href="<?php echo e(getSetting('social-links.tiktok_url')); ?>" target="_blank">
                                        <?php echo $__env->make('elements.icon',['icon'=>'logo-tiktok','variant'=>'medium','classes' => 'text-lg opacity-8'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(getSetting('social-links.youtube_url')): ?>
                                <li class="nav-item">
                                    <a class="nav-link pe-1 ml-2" href="<?php echo e(getSetting('social-links.youtube_url')); ?>" target="_blank">
                                        <?php echo $__env->make('elements.icon',['icon'=>'logo-youtube','variant'=>'medium','classes' => 'text-lg opacity-8'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(getSetting('social-links.telegram_link')): ?>
                                <li class="nav-item">
                                    <a class="nav-link pe-1 ml-2" href="<?php echo e(getSetting('social-links.telegram_link')); ?>" target="_blank">
                                        <?php echo $__env->make('elements.icon',['icon'=>'paper-plane','variant'=>'medium','classes' => 'text-lg opacity-8'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>



                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/template/footer-compact.blade.php ENDPATH**/ ?>