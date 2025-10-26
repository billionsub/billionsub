<div class="d-flex flex-column flex-md-row">

    <div class="mt-1">
        <span
            data-toggle="tooltip"
            data-placement="bottom" title="<?php echo e(__('Add files')); ?>."
            class="h-pill h-pill-primary file-upload-button <?php echo e(!GenericHelper::isUserVerified() && getSetting('site.enforce_user_identity_checks') ? 'disabled' : ''); ?>"
        >
            <?php echo $__env->make('elements.icon',['icon'=>'document-outline','variant'=>'medium','centered'=>true, 'classes' => 'mr-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <span class=""><?php echo e(__("Files")); ?></span>
        </span>
    </div>

    <div class="mt-1 ml-0 ml-md-2">
        <span
            class="h-pill h-pill-primary post-price-button <?php echo e(!GenericHelper::isUserVerified() && getSetting('site.enforce_user_identity_checks') ? 'disabled' : ''); ?>"
            onclick="<?php echo e(!GenericHelper::isUserVerified() && getSetting('site.enforce_user_identity_checks') ? '' : 'PostCreate.showSetPricePostDialog()'); ?>"
            data-toggle="tooltip" data-placement="bottom" title="<?php echo e(__('Set post price')); ?>."
        >
            <?php echo $__env->make('elements.icon',['icon'=>'logo-usd','variant'=>'medium','centered'=>true, 'classes' => 'mr-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <span class="d-none d-md-block"><?php echo e(__("Price")); ?></span>
            <span class="d-block d-md-none"><?php echo e(__("Price")); ?></span>
            <span class="post-price-label ml-1"><?php echo e((isset($post) && $post) > 0 ? "(".\App\Providers\SettingsServiceProvider::getWebsiteFormattedAmount($post->price).")" : ''); ?></span>
        </span>
    </div>

    <?php if(getSetting('profiles.enable_new_post_notification_setting')): ?>
        <div class="d-none"><ion-icon name="notifications-outline"></ion-icon></div>
        <div class="mt-1 ml-0 ml-md-2">
            <span
                data-toggle="tooltip"
                data-placement="bottom"
                title="<?php echo e(__('If enabled, your followers will receive an email notification.')); ?>"
                class="h-pill h-pill-primary post-notification-button <?php echo e(!GenericHelper::isUserVerified() && getSetting('site.enforce_user_identity_checks') ? 'disabled' : ''); ?>"
                onclick="<?php echo e(!GenericHelper::isUserVerified() && getSetting('site.enforce_user_identity_checks') ? '' : 'PostCreate.togglePostNotifications()'); ?>"
            >
               <div class="post-notification-icon">
                <?php echo $__env->make('elements.icon',['icon'=>'notifications-off-outline','variant'=>'medium','centered'=>true, 'classes' => 'mr-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               </div>
                <span class="d-none d-md-block"><?php echo e(__("Notifications")); ?></span>
                <span class="d-block d-md-none"><?php echo e(__("Notify")); ?></span>
            </span>
        </div>
    <?php endif; ?>

    <?php if(getSetting('ai.open_ai_enabled')): ?>
        <?php echo $__env->make('elements.suggest-description', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="mt-1 ml-0 ml-md-2">
            <span
                class="h-pill h-pill-primary <?php echo e(!GenericHelper::isUserVerified() && getSetting('site.enforce_user_identity_checks') ? 'disabled' : ''); ?>"
                data-toggle="tooltip"
                data-placement="bottom"
                title="<?php echo e(__('Use AI to generate your description.')); ?>"
                onclick="<?php echo e(!GenericHelper::isUserVerified() && getSetting('site.enforce_user_identity_checks') ? '' : 'AiSuggestions.suggestDescriptionDialog();'); ?>"
            >
                <?php echo $__env->make('elements.icon',['icon'=>'hardware-chip-outline','variant'=>'medium','centered'=>true, 'classes' => 'mr-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <span class="d-none d-md-block"><?php echo e(trans_choice("Suggestion",2)); ?></span>
                <span class="d-block d-md-none"><?php echo e(trans_choice("Suggestion",2)); ?></span>
            </span>
        </div>
    <?php endif; ?>

    <?php if(getSetting('feed.allow_post_scheduling')): ?>
        <div class="mt-1 ml-0 ml-md-2">
            <span
                class="h-pill h-pill-primary <?php echo e(!GenericHelper::isUserVerified() && getSetting('site.enforce_user_identity_checks') ? 'disabled' : ''); ?>"
                data-toggle="tooltip"
                data-placement="bottom"
                title="<?php echo e(__('Schedule your post release or deletion date.')); ?>"
                onclick="<?php echo e(!GenericHelper::isUserVerified() && getSetting('site.enforce_user_identity_checks') ? '' : 'PostCreate.showPostScheduleDialog();'); ?>"
            >
                <?php echo $__env->make('elements.icon',['icon'=>'alarm-outline','variant'=>'medium','centered'=>true, 'classes' => 'mr-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <span class=""><?php echo e(__("Scheduling")); ?></span>
            </span>
        </div>
    <?php endif; ?>
</div>

<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/post-create-actions.blade.php ENDPATH**/ ?>