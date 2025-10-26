<div class="user-search-box-item mb-4">
    <div class="row px-4">
        <div class="col-auto pr-0">
            <img src="<?php echo e($user->avatar); ?>" class="avatar rounded-circle shadow"/>
        </div>
        <div class="col">
            <div class="d-flex justify-content-between">
                <div class="text-truncate user-search-box-info">
                    <div class="m-0 h6 text-truncate d-flex align-items-center">
                        <a href="<?php echo e(route('profile',['username'=>$user->username])); ?>" class="text-bold text-<?php echo e((Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme') == 'dark' ? 'white' : 'dark') : (Cookie::get('app_theme') == 'dark' ? 'white' : 'dark'))); ?> mr-2 d-flex align-items-center">
                            <?php echo e($user->name); ?>

                        </a>
                        <?php if($user->email_verified_at && $user->birthdate && ($user->verification && $user->verification->status == 'verified')): ?>
                            <span class="" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Verified user')); ?>">
                        <?php echo $__env->make('elements.icon',['icon'=>'checkmark-circle-outline','centered'=>true,'classes'=>'ml-1 text-primary'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </span>
                        <?php endif; ?>
                    </div>
                    <div class="m-0 text-truncate small"><a href="<?php echo e(route('profile',['username'=>$user->username])); ?>" class="text-muted">&commat;<?php echo e($user->username); ?></a></div>
                </div>
                <div class="d-flex align-items-center">
                    <a role="button" class="btn btn-round btn-outline-primary btn-sm px-3 mb-0" href="<?php echo e(route('profile',['username'=>$user->username])); ?>">
                        <?php echo e(__("View")); ?>

                    </a>
                </div>
            </div>

            <div class="mt-1">
                <?php echo e($user->bio ? $user->bio : __('No description available.')); ?>

            </div>

        </div>
    </div>

</div>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/search/users-list-element.blade.php ENDPATH**/ ?>