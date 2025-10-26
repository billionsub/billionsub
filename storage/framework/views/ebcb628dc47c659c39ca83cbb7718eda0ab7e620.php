<div class="suggestion-box card text-white mb-2 border-0 rounded" data-memberuserid="<?php echo e($profile->id); ?>">
    <div style="background: url(<?php echo e($profile->cover); ?>);" class="card-img suggestion-header-bg"></div>
    <div class="card-img-overlay p-0">
        <div class="h-100 w-100 p-0 m-0 position-absolute z-index-0">
            <div class="h-50">
            </div>
            <div class="h-50 w-100 half-bg d-flex"></div>
        </div>
        <div class="card-text w-100 h-100 d-flex">

            <div class="d-flex align-items-center justify-content-center px-3 z-index-3">
                <img src="<?php echo e($profile->avatar); ?>" class="avatar rounded-circle"  />
            </div>

            <div class="w-100 z-index-3 text-truncate">
                <div class="h-50 d-flex flex-row-reverse pr-1">
                    <?php if(isset($isListMode) && ($isListManageable)): ?>
                        <span class="h-pill h-pill-accent rounded mt-1 suggestion-card-btn" data-toggle="tooltip" data-placement="bottom" title="" onclick="Lists.showListMemberRemoveModal(<?php echo e($profile->id); ?>)" data-original-title="<?php echo e(__('Delete')); ?>">
                            <?php echo $__env->make('elements.icon',['icon'=>'trash-outline','variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="h-50 w-100 z-index-3 d-flex flex-column justify-content-center text-truncate pr-2">
                    <div class="m-0 h6 text-truncate"><a href="<?php echo e(route('profile',['username'=>$profile->username])); ?>" class="text-white d-flex align-items-center"><?php echo e($profile->name); ?>

                        <?php if($profile->email_verified_at && $profile->birthdate && ($profile->verification && $profile->verification->status == 'verified')): ?>
                            <span data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Verified user')); ?>">
                                <?php echo $__env->make('elements.icon',['icon'=>'checkmark-circle-outline','centered'=>true,'classes'=>'ml-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </span>
                        <?php endif; ?>
                        </a></div>
                    <div class="m-0 text-truncate"><span>@</span><a href="<?php echo e(route('profile',['username'=>$profile->username])); ?>" class="text-white"><?php echo e($profile->username); ?></a></div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/feed/suggestion-card.blade.php ENDPATH**/ ?>