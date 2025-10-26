<form>

    <?php if(getSetting('profiles.enable_new_post_notification_setting')): ?>
        <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input notification-checkbox" id="notification_email_new_post_created" name="notification_email_new_post_created"
                    <?php echo e(isset(Auth::user()->settings['notification_email_new_post_created']) ? (Auth::user()->settings['notification_email_new_post_created'] == 'true' ? 'checked' : '') : false); ?>>
                <label class="custom-control-label" for="notification_email_new_post_created"><?php echo e(__('New content has been posted')); ?></label>
            </div>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input notification-checkbox" id="notification_email_new_sub" name="notification_email_new_sub"
                <?php echo e(isset(Auth::user()->settings['notification_email_new_sub']) ? (Auth::user()->settings['notification_email_new_sub'] == 'true' ? 'checked' : '') : false); ?>>
            <label class="custom-control-label" for="notification_email_new_sub"><?php echo e(__('New subscription registered')); ?></label>
        </div>
    </div>

    <div class="form-group">
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input notification-checkbox" id="notification_email_new_tip" name="notification_email_new_tip"
                <?php echo e(isset(Auth::user()->settings['notification_email_new_tip']) ? (Auth::user()->settings['notification_email_new_tip'] == 'true' ? 'checked' : '') : false); ?>>
            <label class="custom-control-label" for="notification_email_new_tip"><?php echo e(__('Received a tip')); ?></label>
        </div>
    </div>

    <div class="form-group">
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input notification-checkbox" id="notification_email_new_ppv_unlock" name="notification_email_new_ppv_unlock"
                <?php echo e(isset(Auth::user()->settings['notification_email_new_ppv_unlock']) ? (Auth::user()->settings['notification_email_new_ppv_unlock'] == 'true' ? 'checked' : '') : false); ?>>
            <label class="custom-control-label" for="notification_email_new_ppv_unlock"><?php echo e(__('Your PPV content has been unlocked')); ?></label>
        </div>
    </div>


    <div class="form-group">
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input notification-checkbox" id="notification_email_new_message" name="notification_email_new_message"
                <?php echo e(isset(Auth::user()->settings['notification_email_new_message']) ? (Auth::user()->settings['notification_email_new_message'] == 'true' ? 'checked' : '') : false); ?>>
            <label class="custom-control-label" for="notification_email_new_message"><?php echo e(__('New message received')); ?></label>
        </div>
    </div>

    <div class="form-group">
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input notification-checkbox" id="notification_email_new_comment" name="notification_email_new_comment"
                <?php echo e(isset(Auth::user()->settings['notification_email_new_comment']) ? (Auth::user()->settings['notification_email_new_comment'] == 'true' ? 'checked' : '') : false); ?>>
            <label class="custom-control-label" for="notification_email_new_comment"><?php echo e(__('New comment received')); ?></label>
        </div>
    </div>

    <div class="form-group">
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input notification-checkbox" id="notification_email_expiring_subs" name="notification_email_expiring_subs"
                <?php echo e(isset(Auth::user()->settings['notification_email_expiring_subs']) ? (Auth::user()->settings['notification_email_expiring_subs'] == 'true' ? 'checked' : '') : false); ?>>
            <label class="custom-control-label" for="notification_email_expiring_subs"><?php echo e(__('Expiring subscriptions')); ?></label>
        </div>
    </div>
    <div class="form-group">
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input notification-checkbox" id="notification_email_renewals" name="notification_email_renewals"
                <?php echo e(isset(Auth::user()->settings['notification_email_renewals']) ? (Auth::user()->settings['notification_email_renewals'] == 'true' ? 'checked' : '') : false); ?>>
            <label class="custom-control-label" for="notification_email_renewals"><?php echo e(__('Upcoming renewals')); ?></label>
        </div>
    </div>

        <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input notification-checkbox" id="notification_email_creator_went_live" name="notification_email_creator_went_live"
                    <?php echo e(isset(Auth::user()->settings['notification_email_creator_went_live']) ? (Auth::user()->settings['notification_email_creator_went_live'] == 'true' ? 'checked' : '') : false); ?>>
                <label class="custom-control-label" for="notification_email_creator_went_live"><?php echo e(__('A user I am following went live')); ?></label>
            </div>
        </div>

</form>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/settings/settings-notifications.blade.php ENDPATH**/ ?>