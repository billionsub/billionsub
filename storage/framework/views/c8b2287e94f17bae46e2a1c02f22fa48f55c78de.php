<div class="px-2 list-item">
    <a href="<?php echo e(route('my.lists.show', ['list_id'=> $list->type !== \App\Model\UserList::FOLLOWERS_TYPE ? $list->id : 'followers'])); ?>" class="list-link d-flex flex-column pt-2 pb-2 pl-3 rounded">
        <div class="d-flex flex-row-no-rtl justify-content-between">
            <div>
                <h5 class="text-bold mb-1"><?php echo e(__($list->name)); ?></h5>
                <span class="text-muted text-bold"><?php echo e(trans_choice('people',count($list->members),['number' => count($list->members)])); ?> - <?php echo e(trans_choice('posts', $list->posts_count,['number' => $list->posts_count])); ?></span>
            </div>
            <div class="d-flex justify-content-between align-items-center pr-3 list-box-avatars-wrapper">
                <?php $__currentLoopData = $list->members->reverse()->slice(0,3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <img src="<?php echo e($member->avatar); ?>" class="rounded-circle user-avatar">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </a>
</div>
<?php if(!$isLastItem): ?>
    <hr class="my-2">
<?php endif; ?>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/lists/list-box.blade.php ENDPATH**/ ?>