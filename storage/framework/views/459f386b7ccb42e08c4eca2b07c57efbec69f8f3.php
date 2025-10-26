<div class="<?php echo e(getSetting('custom-code-ads.sidebar_ad_spot') ? 'mt-3' : 'mt-1'); ?> pt-3 text-center <?php echo e(getSetting('custom-code-ads.sidebar_ad_spot') ? 'border-top' : ''); ?> widgets-footer">
    <?php $__currentLoopData = GenericHelper::getFooterPublicPages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('pages.get',['slug' => $page->slug])); ?>" target="" class="widgets-footer-link text-muted text-dark-r m-2"><?php echo e(__($page->short_title ? $page->short_title : $page->title)); ?></a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/template/footer-feed.blade.php ENDPATH**/ ?>