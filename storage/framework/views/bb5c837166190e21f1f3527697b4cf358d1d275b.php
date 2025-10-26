<div class="modal fade" tabindex="-1" role="dialog" id="messageModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title-default"><?php echo e(isset($user) ?   __('Send a new message to',['user' => $user->name]) :  __('Send a new message')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo e(__('Close')); ?>">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="new-message-has-contacts">
                <form id="userMessageForm" role="form" autocomplete="off">
                    <div class="mfv-errorBox"></div>
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <?php if(!isset($user)): ?>
                        <div class="input-holder">
                            <select id="select-repo" name="receiverID" class="repositories form-control input-sm" placeholder="<?php echo e(__('To...')); ?>"></select>
                        </div>
                        <br />
                    <?php else: ?>
                        <input type="hidden" name="receiverID" value="<?php echo e($user->id); ?>" id="receiverID">
                    <?php endif; ?>
                    <div class="form-group focused">
                        <div class="input-holder">
                            <textarea class="form-control" name="message" placeholder="<?php echo e(__('Your message')); ?>" id="messageText"></textarea>
                        </div>
                    </div>
                </form>
                </div>
                <div class="new-message-no-contacts">
                    <?php echo e(__("Before sending a new message, please subscribe to a creator a follow a free profile.")); ?>

                </div>
            </div>
            <div class="modal-footer">
                <div class="new-message-no-contacts">
                    <button type="button" class="btn btn-white mb-0"  data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                </div>
                <div class="new-message-has-contacts">
                <button type="submit" onclick="messenger.<?php echo e(isset($user) ? 'sendDMFromProfilePage' : 'createConversation'); ?>()"  class="btn-primary btn mr-0 new-conversation-label mb-0"> <?php echo e(__('Send')); ?> </button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/messenger/send-user-message.blade.php ENDPATH**/ ?>