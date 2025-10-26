<div class="modal fade" tabindex="-1" role="dialog" id="<?php echo e($dialogName); ?>">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e($title); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo e(__('Close')); ?>">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><?php echo e($content); ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" onclick="<?php echo e($actionFunction); ?>"><?php echo e($actionLabel); ?></button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/public_html/resources/views/elements/standard-dialog.blade.php ENDPATH**/ ?>