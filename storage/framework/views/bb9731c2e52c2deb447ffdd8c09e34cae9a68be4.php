<div class="modal fade" tabindex="-1" role="dialog" id="list-add-user-dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('Add user to list')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><?php echo e(__('Chose the list you want to add the user into')); ?></p>
                <div class="add-user-lists-wrapper">
                    <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-check d-flex mb-3">
                            <input class="form-check-input input-group-lg pointer-cursor" data-listID="<?php echo e($list->id); ?>" type="checkbox" value="" <?php echo e(ListsHelper::isMemberList($list->members, $user_id) ? 'checked' : ''); ?> id="list-<?php echo e($list->id); ?>">
                            <label class="form-check-label ml-3 mt-0 pointer-cursor" for="list-<?php echo e($list->id); ?>">
                                <h6 class="m-0 text-bold"><?php echo e(__($list->name)); ?></h6>
                                <span class="list-subtitle"><?php echo e(trans_choice('members', count($list->members), ['number'=>count($list->members),])); ?> - <?php echo e(trans_choice('posts', $list->posts_count, ['number'=>$list->posts_count])); ?></span>
                            </label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white"  data-dismiss="modal"><?php echo e(__('Close')); ?></button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/lists/list-add-user-dialog.blade.php ENDPATH**/ ?>