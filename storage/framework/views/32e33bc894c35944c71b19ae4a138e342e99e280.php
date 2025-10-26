<div class="modal fade" tabindex="-1" role="dialog" id="message-set-price-dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('Set message price')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><?php echo e(__('Paid messages are locked for subscribers as well. Text is not locked, only media.')); ?></p>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="amount-label"><?php echo $__env->make('elements.icon',['icon'=>'cash-outline','variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></span>
                    </div>
                    <input id="message-price" type="number" class="form-control" name="text" required  placeholder="<?php echo e(__('Post price')); ?>" value="5" min="1" max="100">
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e(__('The price must be between :min and :max.',['min' => getSetting('payments.min_ppv_message_price') ?? 1, 'max' => getSetting('payments.max_ppv_message_price') ?? 500])); ?></strong>
                    </span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" onclick="messenger.clearMessagePrice()"><?php echo e(__('Clear')); ?></button>
                <button type="button" class="btn btn-primary" onclick="messenger.saveMessagePrice()"><?php echo e(__('Save')); ?></button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/messenger/message-price-dialog.blade.php ENDPATH**/ ?>