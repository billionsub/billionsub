`   `   <div class="modal fade" tabindex="-1" role="dialog" id="stream-update-dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span class="create-label d-none"><?php echo e(__('Start a new stream')); ?></span> <span class="edit-label d-none"><?php echo e(__('Edit stream details')); ?></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo e(__('Close')); ?>">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">

                    <div class="d-flex justify-content-between">
                        <label for="username"><?php echo e(__('Stream name')); ?></label>
                        <div>
                            <?php if(getSetting('ai.open_ai_enabled')): ?>
                                <a href="javascript:void(0)" onclick="<?php echo e("AiSuggestions.suggestDescriptionDialog();"); ?>" data-toggle="tooltip" data-placement="left" title="<?php echo e(__('Use AI to generate your description.')); ?>"><?php echo e(trans_choice("Suggestion",2)); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <input class="form-control" id="stream-name" name="stream-name" aria-describedby="name" value="<?php echo e($activeStream ? $activeStream->name : ''); ?>">
                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>

                <div class="form-group">
                    <label for="username"><?php echo e(__('Access price')); ?></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="amount-label"><?php echo $__env->make('elements.icon',['icon'=>'cash-outline','variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></span>
                        </div>
                        <input class="form-control" id="stream-access_price" name="access_price" aria-describedby="access_price" value="<?php echo e($activeStream ? $activeStream->price : ''); ?>"  type="number">
                        <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('access_price')); ?></strong>
                        </span>
                    </div>

                </div>

                <div class="form-group">
                    <label for="username"><?php echo e(__('Stream poster')); ?></label>
                    <div class="card profile-cover-bg" style="background-image: url('<?php echo e($activeStream && $activeStream->poster ? $activeStream->poster : asset('/img/live-stream-cover.svg')); ?>');">
                        <div class="card-img-overlay d-flex justify-content-center align-items-center">
                            <div class="actions-holder d-none">
                                <div class="d-flex">
                                    <span class="h-pill h-pill-accent pointer-cursor mr-1 upload-button" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Upload stream poster')); ?>">
                                         <?php echo $__env->make('elements.icon',['icon'=>'image','variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="requires_subscription" name="requires_subscription" <?php echo e($activeStream && $activeStream->requires_subscription ? 'checked' : ''); ?>>
                    <label class="custom-control-label" for="requires_subscription"><?php echo e(__("Requires a subscription")); ?></label>
                </div>

                <div class="custom-control custom-switch mt-1">
                    <input type="checkbox" class="custom-control-input" id="is_public" name="is_public" <?php echo e($activeStream ? ( $activeStream->is_public ? 'checked' : '') : 'checked'); ?>>
                    <label class="custom-control-label" for="is_public"><?php echo e(__("Is public stream")); ?></label>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary stream-save-btn" onclick="Streams.updateStream();"><?php echo e(__('Save')); ?></button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/streams/stream-create-update-dialog.blade.php ENDPATH**/ ?>