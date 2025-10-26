<footer class="footer py-5">
    <div class="container">
        <div class="">
            <div class="mx-auto ">
                <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-center">
                    <div class="">
                        <!-- About -->
                        <div class="headline d-flex">
                            <a href="<?php echo e(route('home')); ?>">
                                <h3 class="font-weight-bold text-gradient bg-white text-center"><?php echo e(__('Billion sub')); ?></h3>
                            </a>
                        </div>
                    </div>
                    <div class="d-flex justify-content-md-center align-items-center mt-4 mt-md-0 footer-social-links">
                        <?php if(getSetting('social-links.facebook_url')): ?>
                            <a class="m-2" href="<?php echo e(getSetting('social-links.facebook_url')); ?>" target="_blank" alt="<?php echo e(__("Facebook")); ?>" title="<?php echo e(__("Facebook")); ?>">
                                <?php echo $__env->make('elements.icon',['icon'=>'logo-facebook','variant'=>'medium','classes' => 'opacity-8'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </a>
                        <?php endif; ?>
                        <?php if(getSetting('social-links.twitter_url')): ?>
                            <a class="m-2" href="<?php echo e(getSetting('social-links.twitter_url')); ?>" target="_blank" alt="<?php echo e(__("Twitter")); ?>" title="<?php echo e(__("Twitter")); ?>">
                                <?php echo $__env->make('elements.icon',['icon'=>'logo-twitter','variant'=>'medium','classes' => 'opacity-8'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </a>
                        <?php endif; ?>
                        <?php if(getSetting('social-links.instagram_url')): ?>
                            <a class="m-2" href="<?php echo e(getSetting('social-links.instagram_url')); ?>" target="_blank" alt="<?php echo e(__("Instagram")); ?>" title="<?php echo e(__("Instagram")); ?>">
                                <?php echo $__env->make('elements.icon',['icon'=>'logo-instagram','variant'=>'medium','classes' => 'opacity-8'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </a>
                        <?php endif; ?>
                        <?php if(getSetting('social-links.whatsapp_url')): ?>
                            <a class="m-2" href="<?php echo e(getSetting('social-links.whatsapp_url')); ?>" target="_blank" alt="<?php echo e(__("Whatsapp")); ?>" title="<?php echo e(__("Whatsapp")); ?>">
                                <?php echo $__env->make('elements.icon',['icon'=>'logo-whatsapp','variant'=>'medium','classes' => 'opacity-8'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </a>
                        <?php endif; ?>
                        <?php if(getSetting('social-links.tiktok_url')): ?>
                            <a class="m-2" href="<?php echo e(getSetting('social-links.tiktok_url')); ?>" target="_blank" alt="<?php echo e(__("Tiktok")); ?>" title="<?php echo e(__("Tiktok")); ?>">
                                <?php echo $__env->make('elements.icon',['icon'=>'logo-tiktok','variant'=>'medium','classes' => 'opacity-8'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </a>
                        <?php endif; ?>
                        <?php if(getSetting('social-links.youtube_url')): ?>
                            <a class="m-2" href="<?php echo e(getSetting('social-links.youtube_url')); ?>" target="_blank" alt="<?php echo e(__("Youtube")); ?>" title="<?php echo e(__("Youtube")); ?>">
                                <?php echo $__env->make('elements.icon',['icon'=>'logo-youtube','variant'=>'medium','classes' => 'opacity-8'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </a>
                        <?php endif; ?>
                        <?php if(getSetting('social-links.telegram_link')): ?>
                            <a class="m-2" href="<?php echo e(getSetting('social-links.telegram_link')); ?>" target="_blank" alt="<?php echo e(__("Telegram")); ?>" title="<?php echo e(__("Telegram")); ?>">
                                <?php echo $__env->make('elements.icon',['icon'=>'paper-plane','variant'=>'medium','classes' => 'text-lg opacity-8'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </a>
                        <?php endif; ?>
                        <?php if(getSetting('social-links.reddit_url')): ?>
                            <a class="m-2" href="<?php echo e(getSetting('social-links.reddit_url')); ?>" target="_blank" alt="<?php echo e(__("Reddit")); ?>" title="<?php echo e(__("Reddit")); ?>">
                                <?php echo $__env->make('elements.icon',['icon'=>'logo-reddit','variant'=>'medium','classes' => 'text-lg opacity-8'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="d-flex flex-column flex-md-row mt-3 mt-md-4">
                    <a href="<?php echo e(route('contact')); ?>" class="text-dark-r mr-2 mt-0 mt-md-2 mb-2 ml-2 ml-md-0">
                        <?php echo e(__('Contact page')); ?>

                    </a>
                    <?php $__currentLoopData = GenericHelper::getFooterPublicPages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('pages.get',['slug' => $page->slug])); ?>" target="" class="text-dark-r m-2"><?php echo e(__($page->title)); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <hr>
            </div>
        </div>

        <div class="">
            <div class="copyRightInfo d-flex flex-column-reverse flex-md-row d-md-flex justify-content-md-between">
                <div class="d-flex align-items-center justify-content-center mt-3 mt-md-0">
                    <p class="mb-0">&copy; <?php echo e(date('Y')); ?> <?php echo e(getSetting('site.name')); ?>. <?php echo e(__('All rights reserved.')); ?></p>
                </div>
                <div class="d-flex justify-content-center">
                    <?php echo $__env->make('elements.footer.dark-mode-switcher', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('elements.footer.direction-switcher', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('elements.footer.language-switcher', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>

    </div>
</footer>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/public_html/resources/views/template/footer.blade.php ENDPATH**/ ?>