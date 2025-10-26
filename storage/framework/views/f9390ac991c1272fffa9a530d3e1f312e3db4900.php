<div class="px-3 px-md-0">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-10">
            <div class="">
                <img src="<?php echo e(asset('/img/post-locked.svg')); ?>">
            </div>
        </div>
    </div>
    <?php if($type == 'post'): ?>
        <?php if(getSetting('feed.show_attachments_counts_for_ppv')): ?>
            
            <div class="col-12 mb-3 n-mt-2">
                <div class="d-flex flex-row">
                    <?php $__currentLoopData = PostsHelper::getAttachmentsTypesCount($post->attachments); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php switch($type):
                            case ('image'): ?>
                            <div class="d-flex justify-content-center align-items-center mr-2">
                                <?php echo $__env->make('elements.icon',['icon'=>'images-outline','centered' => false,'variant'=>'small', 'classes' => 'mr-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e($count); ?>

                            </div>
                            <?php break; ?>
                            <?php case ('video'): ?>
                            <div class="d-flex justify-content-center align-items-center mr-2">
                                <?php echo $__env->make('elements.icon',['icon'=>'videocam-outline','centered' => false,'variant'=>'small', 'classes' => 'mr-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e($count); ?>

                            </div>
                            <?php break; ?>
                            <?php case ('audio'): ?>
                            <div class="d-flex justify-content-center align-items-center mr-2">
                                <?php echo $__env->make('elements.icon',['icon'=>'musical-notes-outline','centered' => false,'variant'=>'small', 'classes' => 'mr-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e($count); ?>

                            </div>
                            <?php break; ?>
                        <?php endswitch; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
        
        <div class="col-12">
            <button class="btn btn-outline-primary btn-block to-tooltip <?php echo e((!GenericHelper::creatorCanEarnMoney($post->user)) ? 'disabled' : ''); ?>"
                    <?php if(Auth::check()): ?>
                    <?php if(!GenericHelper::creatorCanEarnMoney($post->user)): ?>
                    data-placement="top"
                    title="<?php echo e(__('This creator cannot earn money yet')); ?>"
                    <?php else: ?>
                    data-toggle="modal"
                    data-target="#checkout-center"
                    data-type="post-unlock"
                    data-recipient-id="<?php echo e($post->user->id); ?>"
                    data-amount="<?php echo e($post->price); ?>"
                    data-first-name="<?php echo e(Auth::user()->first_name); ?>"
                    data-last-name="<?php echo e(Auth::user()->last_name); ?>"
                    data-billing-address="<?php echo e(Auth::user()->billing_address); ?>"
                    data-country="<?php echo e(Auth::user()->country); ?>"
                    data-city="<?php echo e(Auth::user()->city); ?>"
                    data-state="<?php echo e(Auth::user()->state); ?>"
                    data-postcode="<?php echo e(Auth::user()->postcode); ?>"
                    data-available-credit="<?php echo e(Auth::user()->wallet->total); ?>"
                    data-username="<?php echo e($post->user->username); ?>"
                    data-name="<?php echo e($post->user->name); ?>"
                    data-avatar="<?php echo e($post->user->avatar); ?>"
                    data-post-id="<?php echo e($post->id); ?>"
                    <?php endif; ?>
                    <?php else: ?>
                    data-toggle="modal"
                    data-target="#login-dialog"
                <?php endif; ?>
            ><?php echo e(__('Unlock post for')); ?> <?php echo e(\App\Providers\SettingsServiceProvider::getWebsiteFormattedAmount($post->price)); ?></button>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/feed/post-locked.blade.php ENDPATH**/ ?>