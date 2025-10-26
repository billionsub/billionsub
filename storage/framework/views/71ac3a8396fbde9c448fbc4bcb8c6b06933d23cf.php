<?php
    $announcement = GenericHelper::getLatestGlobalMessage();
?>
<?php if( $announcement &&
    ($announcement->is_global || (!$announcement->is_global && in_array(Route::currentRouteName(),['home'])))
    && !request()->cookie('dismissed_banner_' . $announcement->id)
    && (!$announcement->expiring_at || ($announcement->expiring_at && $announcement->expiring_at > \Carbon\Carbon::now()))

    ): ?>
    <div class="<?php echo e($announcement->is_sticky ? 'sticky-info-bar' : ''); ?> alert alert-dismissible fade show mb-0 p-0 border-0 global-announcement-banner" role="alert" data-banner-id="<?php echo e($announcement->id); ?>">
        <div class="content text-center block bg-gradient-faded-primary text-dark <?php echo e($announcement->size === 'small' ? 'py-1' : 'py-3'); ?>">
            <div class="content">
                <?php echo $announcement->content; ?>

            </div>
            <?php if($announcement->is_dismissible): ?>
                <div class="d-flex align-content-center">
                    <button type="button" class="close text-white <?php echo e($announcement->size === 'small' ? 'pt-1' : 'pt-3'); ?>" data-dismiss="alert" aria-label="Close" onclick="dimissGlobalAnnouncement('<?php echo e($announcement->id); ?>')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/public_html/resources/views/elements/global-announcement.blade.php ENDPATH**/ ?>