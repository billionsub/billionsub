<div class="modal fade" tabindex="-1" role="dialog" id="report-user-post">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('Report user or post')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="control-group">
                    <label for="reasonExamples"><?php echo e(__('Reason')); ?></label>
                    <select id="reasonExamples" class="form-control">
                        <?php $__currentLoopData = $reportStatuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($status); ?>"><?php echo e(__($status)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="control-group mt-2">
                    <label for="exampleTextarea"><?php echo e(__('Details')); ?></label>
                    <textarea class="form-control" id="post_report_details" rows="2"></textarea>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning submit-report-button"><?php echo e(__('Report')); ?></button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/report-user-or-post.blade.php ENDPATH**/ ?>