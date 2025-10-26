<div class="conversation-header d-none">
    <div class="details-holder border-bottom">
        <div class="d-flex px-1">
            <div class="col-10 pl-0 d-flex">
                <div class="">
                    <img class="conversation-header-avatar" src="<?php echo e(asset('/img/no-avatar.png')); ?>" />
                </div>
                <div class="mt-2 ml-3 conversation-header-user text-truncate">

                </div>
            </div>
            <div class="col-2 pt-2 pr-0 d-flex justify-content-end">
                <div class="dropdown <?php echo e(GenericHelper::getSiteDirection() == 'rtl' ? 'dropright' : 'dropleft'); ?>">
                    <a class="btn btn-sm btn-outline-primary dropdown-toggle px-2 py-1" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php echo $__env->make('elements.icon',['icon'=>'ellipsis-horizontal-outline'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </a>
                    <div class="dropdown-menu">
                        <!-- Dropdown menu links -->
                        <a class="dropdown-item d-flex align-items-center tip-btn"
                           data-toggle="modal"
                           data-target="#checkout-center"
                           data-type="chat-tip"
                           data-first-name="<?php echo e(Auth::user()->first_name); ?>"
                           data-last-name="<?php echo e(Auth::user()->last_name); ?>"
                           data-billing-address="<?php echo e(Auth::user()->billing_address); ?>"
                           data-country="<?php echo e(Auth::user()->country); ?>"
                           data-city="<?php echo e(Auth::user()->city); ?>"
                           data-state="<?php echo e(Auth::user()->state); ?>"
                           data-postcode="<?php echo e(Auth::user()->postcode); ?>"
                           data-available-credit="<?php echo e(Auth::user()->wallet->total); ?>"
                        ><?php echo e(__('Send a tip')); ?></a>
                        <a class="dropdown-item d-flex align-items-center conversation-profile-link" href="#" target="_blank"><?php echo e(__('Go to profile')); ?></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item unfollow-btn" href="javascript:void(0);"><?php echo e(__('Unfollow')); ?></a>
                        <a class="dropdown-item block-btn" href="javascript:void(0);"><?php echo e(__('Block')); ?></a>
                        <a class="dropdown-item report-btn" href="javascript:void(0);"><?php echo e(__('Report')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/messenger/messenger-conversation-header.blade.php ENDPATH**/ ?>