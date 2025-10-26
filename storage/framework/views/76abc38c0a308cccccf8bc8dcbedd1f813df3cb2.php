<div class="modal fade" tabindex="-1" role="dialog" id="post-set-price-dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('Set post price')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><?php echo e(__('Paid posts are locked for subscribers as well.')); ?></p>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="amount-label"><?php echo $__env->make('elements.icon',['icon'=>'cash-outline','variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></span>
                    </div>
                    <input id="post-price" type="number" class="form-control" name="text" required  placeholder="<?php echo e(__('Post price')); ?>" value="<?php echo e($postPrice); ?>">
                    <span class="invalid-feedback" role="alert">
                        <strong class="post-price-error min-error d-none"><?php echo e(__('The price must be between :min and :max.',['min' => getSetting('payments.min_ppv_post_price') ?? 1, 'max' => getSetting('payments.max_ppv_post_price') ?? 500])); ?></strong>
                        <strong class="post-price-error ppv-error d-none"><?php echo e(__('Posts having an expire date can not be price locked.')); ?></strong>
                    </span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white"   onclick="PostCreate.clearPostPrice()"><?php echo e(__('Clear')); ?></button>
                <button type="button" class="btn btn-primary" onclick="PostCreate.savePostPrice()"><?php echo e(__('Save')); ?></button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/post-price-setup.blade.php ENDPATH**/ ?>