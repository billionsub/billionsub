<div class="modal fade" tabindex="-1" role="dialog" id="stream-stop-dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('End stream')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo e(__('Close')); ?>">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><?php echo e(__('Are you sure you want to end this stream?')); ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning end-stream-label" onclick="Streams.endStream();"><?php echo e(__('Stop stream')); ?></button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/streams/stream-stop-dialog.blade.php ENDPATH**/ ?>