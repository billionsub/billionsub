<div class="border rounded shadow-sm w-100">
    <div class="creator-header">
        <div style="background:url(<?php echo e($profile->cover); ?>);" class="card-img suggestion-header-bg border-bottom" alt="<?php echo e($profile->name); ?>"></div>
    </div>
    <div class="ml-4 creator-body">
        <div class="row">
            <div class="col-12 col-md-auto">
                <div class="d-flex justify-content-center">
                    <img src="<?php echo e($profile->avatar); ?>" class="avatar rounded-circle shadow" alt="<?php echo e($profile->name); ?>"/>
                </div>
            </div>
            <div class="pl-2 col-12 col-md-auto">
                <div class="h-50"></div>
                <div class="h-50 d-flex flex-column justify-content-center pt-1">
                    <div class="pr-2">
                        <div class="m-0 h6 text-truncate d-flex  align-items-center">
                            <a href="<?php echo e(route('profile',['username'=>$profile->username])); ?>" class="text-bold text-<?php echo e((Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme') == 'dark' ? 'white' : 'dark') : (Cookie::get('app_theme') == 'dark' ? 'white' : 'dark'))); ?> mr-2 d-flex align-items-center">
                                <?php echo e($profile->name); ?>

                            </a>
                        </div>
                        <div class="m-0 text-truncate small"><a href="<?php echo e(route('profile',['username'=>$profile->username])); ?>" class="text-muted">&commat;<?php echo e($profile->username); ?></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="my-4 ml-4">
            <ul class="list-unstyled">
                <li class="d-flex align-items-center" ><?php echo $__env->make('elements.icon',['icon'=>'checkmark-sharp','centered'=>false, 'classes' => 'mr-2 text-muted', 'variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  <?php echo e(__("Full access to this user's content")); ?></li>
                <li class="d-flex align-items-center" ><?php echo $__env->make('elements.icon',['icon'=>'checkmark-sharp','centered'=>false, 'classes' => 'mr-2 text-muted', 'variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(__('Direct message with this user')); ?></li>
                <li class="d-flex align-items-center" ><?php echo $__env->make('elements.icon',['icon'=>'checkmark-sharp','centered'=>false, 'classes' => 'mr-2 text-muted', 'variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  <?php echo e(__('Cancel your subscription at any time')); ?></li>
            </ul>
        </div>
    </div>
</div>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/vertical-member-card.blade.php ENDPATH**/ ?>