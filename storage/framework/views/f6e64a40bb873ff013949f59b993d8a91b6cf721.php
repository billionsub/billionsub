<?php $__env->startSection('page_title', __('Messenger')); ?>

<?php $__env->startSection('styles'); ?>
    <?php echo Minify::stylesheet([
            '/libs/@selectize/selectize/dist/css/selectize.css',
            '/libs/@selectize/selectize/dist/css/selectize.bootstrap4.css',
            '/libs/dropzone/dist/dropzone.css',
            '/libs/photoswipe/dist/photoswipe.css',
            '/libs/photoswipe/dist/default-skin/default-skin.css',
            '/css/pages/messenger.css',
            '/css/pages/checkout.css'
         ])->withFullUrl(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo Minify::javascript([
            '/js/messenger/messenger.js',
            '/js/messenger/elements.js',
            '/libs/@selectize/selectize/dist/js/standalone/selectize.min.js',
            '/libs/dropzone/dist/dropzone.js',
            '/js/FileUpload.js',
            '/js/plugins/media/photoswipe.js',
            '/libs/photoswipe/dist/photoswipe-ui-default.min.js',
            '/js/plugins/media/mediaswipe.js',
            '/js/plugins/media/mediaswipe-loader.js',
            '/js/pages/lists.js',
            '/js/pages/checkout.js',
            '/libs/pusher-js-auth/lib/pusher-auth.js'
         ])->withFullUrl(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('elements.uploaded-file-preview-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('elements.photoswipe-container', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('elements.report-user-or-post',['reportStatuses' => ListsHelper::getReportTypes()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('elements.feed.post-delete-dialog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('elements.feed.post-list-management', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('elements.messenger.message-price-dialog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('elements.checkout.checkout-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('elements.attachments-uploading-dialog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('elements.messenger.locked-message-no-attachments-dialog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class=" col-12">
            <div class="container messenger ">
                <div class="row ">
                    <div class="col-3 col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-2 border border-right-0 border-left-0 rounded-left conversations-wrapper  overflow-hidden border-top ">
                        <div class="d-flex justify-content-center justify-content-md-between pt-3 pr-1 pb-2">
                            <h5 class="d-none d-md-block text-truncate pl-3 pl-md-0 text-bold <?php echo e((Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme') == 'dark' ? '' : 'text-dark-r') : (Cookie::get('app_theme') == 'dark' ? '' : 'text-dark-r'))); ?>"><?php echo e(__('Contacts')); ?></h5>
                            <span data-toggle="tooltip" title="" class="pointer-cursor"
                                  <?php if(!count($availableContacts)): ?>
                                    data-original-title="<?php echo e(trans_choice('Before sending a new message, please subscribe to a creator a follow a free profile.',['user' => 0])); ?>"
                                  <?php else: ?>
                                    data-original-title="<?php echo e(trans_choice('Send a new message',['user' => 0])); ?>"
                                  <?php endif; ?>
                            >
                                <a title="" class="pointer-cursor new-conversation-toggle" data-original-title="<?php echo e(trans_choice('Send a new message',['user' => 0])); ?>">  <div class="mt-0 h5"><?php echo $__env->make('elements.icon',['icon'=>'create-outline','variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> </div> </a>
                            </span>
                        </div>
                        <div class="conversations-list">
                            <?php if($lastContactID == false): ?>
                                <div class="d-flex mt-3 mt-md-2 pl-3 pl-md-0 mb-3 pl-md-0"><span><?php echo e(__('Click the text bubble to send a new message.')); ?></span></div>
                            <?php else: ?>
                                <?php echo $__env->make('elements.preloading.messenger-contact-box', ['limit'=>3], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-9 col-xl-9 col-lg-9 col-md-9 col-sm-9 col-xs-10 border conversation-wrapper rounded-right p-0 d-flex flex-column ">
                        <?php echo $__env->make('elements.message-alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('elements.messenger.messenger-conversation-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('elements.messenger.messenger-new-conversation-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('elements.preloading.messenger-conversation-header-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('elements.preloading.messenger-conversation-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="conversation-content pt-4 pb-1 px-3 flex-fill">
                        </div>
                        <div class="dropzone-previews dropzone w-100 ppl-0 pr-0 pt-1 pb-1"></div>
                        <div class="conversation-writeup pt-1 pb-1 d-flex align-items-center mb-1 <?php echo e(!$lastContactID ? 'hidden' : ''); ?>">
                            <div class="messenger-buttons-wrapper d-flex pl-2">
                                <button class="btn btn-outline-primary btn-rounded-icon messenger-button attach-file mx-2 file-upload-button to-tooltip" data-placement="top" title="<?php echo e(__('Attach file')); ?>">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <?php echo $__env->make('elements.icon',['icon'=>'document','variant'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </button>
                            </div>
                            <form class="message-form w-100">
                                <div class="input-group messageBoxInput-wrapper">
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    <input type="hidden" name="receiverID" id="receiverID" value="">
                                    <textarea name="message" class="form-control messageBoxInput dropzone" placeholder="<?php echo e(__('Write a message..')); ?>" onkeyup="messenger.textAreaAdjust(this)"></textarea>



                                </div>
                            </form>
                            <div class="messenger-buttons-wrapper d-flex">
                                <?php if((GenericHelper::creatorCanEarnMoney(Auth::user()) && !(!GenericHelper::isUserVerified() && getSetting('site.enforce_user_identity_checks'))) /*|| Auth::user()->role_id === 1*/): ?>
                                    <button class="btn btn-outline-primary btn-rounded-icon messenger-button mx-2 to-tooltip" data-placement="top" title="<?php echo e(__('Message price')); ?>" onClick="messenger.showSetPriceDialog()">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <span class="message-price-lock"><?php echo $__env->make('elements.icon',['icon'=>'lock-open','variant'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></span>
                                            <span class="message-price-close d-none"><?php echo $__env->make('elements.icon',['icon'=>'lock-closed','variant'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></span>
                                        </div>
                                    </button>
                                <?php endif; ?>
                                <button class="btn btn-outline-primary btn-rounded-icon messenger-button send-message mr-2 to-tooltip" onClick="messenger.sendMessage()" data-placement="top" title="<?php echo e(__('Send message')); ?>">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <?php echo $__env->make('elements.icon',['icon'=>'paper-plane','variant'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('elements.standard-dialog',[
    'dialogName' => 'message-delete-dialog',
    'title' => __('Delete message'),
    'content' => __('Are you sure you want to delete this message?'),
    'actionLabel' => __('Delete'),
    'actionFunction' => 'messenger.deleteMessage();',
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user-no-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/pages/messenger.blade.php ENDPATH**/ ?>