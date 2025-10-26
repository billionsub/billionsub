<?php $__env->startSection('page_title', __($page->title)); ?>
<?php $__env->startSection('share_url', route('home')); ?>
<?php $__env->startSection('share_title', getSetting('site.name') . ' - ' . getSetting('site.slogan')); ?>
<?php $__env->startSection('share_description', getSetting('site.description')); ?>
<?php $__env->startSection('share_type', 'article'); ?>
<?php $__env->startSection('share_img', GenericHelper::getOGMetaImage()); ?>

<?php $__env->startSection('content'); ?>
    <div class="container pt-5">
        <div class="page-content-wrapper pb-5">
            <div class="row">
                <div class="col-12">
                    <div class="mt-1 mb-5 text-center">
                        <h1 class=" text-bold"><?php echo e($page->title); ?></h1>
                        <?php if(in_array($page->slug,['help','privacy','terms-and-conditions'])): ?>
                            <p class="text-muted mb-0 mt-2"><?php echo e(__("Last updated")); ?>: <?php echo e($page->updated_at->format('Y-m-d')); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex justify-content-center">
                        <div class="col-12 col-md-8">
                            <?php echo $page->content; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.generic', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/public_html/resources/views/pages/public-page.blade.php ENDPATH**/ ?>