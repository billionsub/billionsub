<?php if( !(!$isGallery && AttachmentHelper::getAttachmentType($attachment->type) == 'video')): ?>
    <a href="<?php echo e($attachment->path); ?>" rel="mswp" title="" class="no-long-press">
        <?php endif; ?>

        <?php if($isGallery): ?>
            <?php if(AttachmentHelper::getAttachmentType($attachment->type) == 'image'): ?>
                <div class="post-media-image" style="background-image: url('<?php echo e($attachment->path); ?>');">
                </div>
            <?php elseif(AttachmentHelper::getAttachmentType($attachment->type) == 'video'): ?>
                <div class="video-wrapper h-100 w-100 d-flex justify-content-center align-items-center">
                    <video class="video-preview w-100" src="<?php echo e($attachment->path); ?>#t=0.001" controls controlsList="nodownload" preload="metadata" <?php echo ($attachment->has_thumbnail ? 'poster="'.$attachment->thumbnail.'"' : ''); ?>></video>
                </div>
            <?php elseif(AttachmentHelper::getAttachmentType($attachment->type) == 'audio'): ?>
                <div class="video-wrapper h-100 w-100 d-flex justify-content-center align-items-center">
                    <audio class="video-preview w-75" src="<?php echo e($attachment->path); ?>#t=0.001" controls controlsList="nodownload" preload="metadata"></audio>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <?php if(AttachmentHelper::getAttachmentType($attachment->type) == 'image'): ?>
                <img src="<?php echo e($attachment->path); ?>" draggable="false" alt="" class="img-fluid rounded-0 w-100">
            <?php elseif(AttachmentHelper::getAttachmentType($attachment->type) == 'video'): ?>
                <div class="video-wrapper h-100 w-100 d-flex justify-content-center align-items-center">
                    <video class="video-preview w-100" src="<?php echo e($attachment->path); ?>#t=0.001" controls controlsList="nodownload" preload="metadata" <?php echo ($attachment->has_thumbnail ? 'poster="'.$attachment->thumbnail.'"' : ''); ?>></video>
                </div>
            <?php elseif(AttachmentHelper::getAttachmentType($attachment->type) == 'audio'): ?>
                <div class="video-wrapper h-100 w-100 d-flex justify-content-center align-items-center">
                    <audio class="video-preview w-75" src="<?php echo e($attachment->path); ?>#t=0.001" controls controlsList="nodownload" preload="metadata"></audio>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <?php if( !(!$isGallery && AttachmentHelper::getAttachmentType($attachment->type) == 'video')): ?>
    </a>
<?php endif; ?>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/feed/post-box-media-wrapper.blade.php ENDPATH**/ ?>