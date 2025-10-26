
<?php if($subscribersCount): ?>
    <div class="mt-0 mt-md-3 mb-1 inline-border-tabs">
        <nav class="nav nav-pills nav-justified">
            <?php $__currentLoopData = ['subscriptions', 'subscribers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="nav-item nav-link <?php echo e($activeSubsTab == $tab ? 'active' : ''); ?>" href="<?php echo e(route('my.settings',['type' => 'subscriptions', 'active' => $tab])); ?>">

                    <div class="d-flex align-items-center justify-content-center">
                        <?php if($tab == 'subscriptions'): ?>
                            <?php echo $__env->make('elements.icon',['icon'=>'people','variant'=>'medium','classes'=>'mr-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php else: ?>
                            <?php echo $__env->make('elements.icon',['icon'=>'logo-usd','variant'=>'medium','classes'=>'mr-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <?php echo e(ucfirst(__($tab))); ?>

                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </nav>
    </div>
<?php endif; ?>

<?php if(count($subscriptions)): ?>
    <div class="table-wrapper">
        <?php echo $__env->make('elements/message-alert', ['classes' =>'p-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="">
            <div class="col d-flex align-items-center py-3 border-bottom text-bold">
                <div class="col-4 col-md-3 text-truncate"><?php echo e($activeSubsTab == 'subscriptions' ? __('To') : __('From')); ?></div>
                <div class="col-3 col-md-2 text-truncate"><?php echo e(__('Status')); ?></div>
                <div class="col-2 text-truncate d-none d-md-block"><?php echo e(__('Paid with')); ?></div>
                <div class="col-4 col-md-2 text-truncate"><?php echo e(__('Renews')); ?></div>
                <div class="col-2 text-truncate d-none d-md-block"><?php echo e(__('Expires at')); ?></div>
                <div class="col-1 text-truncate"></div>
            </div>
            <?php $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col d-flex align-items-center py-3 border-bottom">
                    <div class="col-4 col-md-3 text-truncate">
                        <span class="mr-2">
                        <a href="<?php echo e(route('profile',['username'=> $activeSubsTab == 'subscriptions' ? $subscription->creator->username : $subscription->subscriber->username])); ?>" class="">
                            <img src="<?php echo e($activeSubsTab == 'subscriptions' ? $subscription->creator->avatar : $subscription->subscriber->avatar); ?>" class="rounded-circle user-avatar" width="35">
                        </a>
                        </span>
                        <a href="<?php echo e(route('profile',['username'=> $activeSubsTab == 'subscriptions' ? $subscription->creator->username : $subscription->subscriber->username])); ?>" class="text-dark-r">
                            <?php echo e($activeSubsTab == 'subscriptions' ? $subscription->creator->name : $subscription->subscriber->name); ?>

                        </a>
                    </div>
                    <div class="col-3 col-md-2">
                        <?php switch($subscription->status):
                            case ('pending'): ?>
                            <?php case ('update-needed'): ?>
                            <?php case ('canceled'): ?>
                            <span class="badge badge-warning"><?php echo e(ucfirst(__($subscription->status))); ?></span>
                            <?php break; ?>
                            <?php case ('completed'): ?>
                            <span class="badge badge-success"><?php echo e(ucfirst(__($subscription->status))); ?></span>
                            <?php break; ?>
                            <?php case ('suspended'): ?>
                            <?php case ('expired'): ?>
                            <?php case ('failed'): ?>
                            <span class="badge badge-danger"><?php echo e(ucfirst(__($subscription->status))); ?></span>
                            <?php break; ?>
                        <?php endswitch; ?>
                    </div>
                    <div class="col-2 text-truncate d-none d-md-block"><?php echo e(ucfirst($subscription->provider)); ?></div>
                    <div class="col-4 col-md-2 text-truncate text-center"><?php echo e(isset($subscription->expires_at) ? ($subscription->status == \App\Model\Subscription::CANCELED_STATUS ? '-' : $subscription->expires_at->format('M d Y')) : '-'); ?></div>
                    <div class="col-2 text-truncate d-none d-md-block text-center"><?php echo e(isset($subscription->expires_at) ? ($subscription->status == \App\Model\Subscription::ACTIVE_STATUS ? '-' : $subscription->expires_at->format('M d Y')) : '-'); ?></div>
                    <div class="col-1 text-center">
                        <?php if($subscription->status === \App\Model\Subscription::ACTIVE_STATUS): ?>
                            <div class="dropdown <?php echo e(GenericHelper::getSiteDirection() == 'rtl' ? 'dropright' : 'dropleft'); ?>">
                                <a class="btn btn-sm text-dark-r text-hover <?php echo e($subscription->status == 'canceled' ? 'disabled' : ''); ?> btn-outline-<?php echo e((Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme') == 'dark' ? 'dark' : 'light') : (Cookie::get('app_theme') == 'dark' ? 'dark' : 'light'))); ?> dropdown-toggle m-0 py-1 px-2" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $__env->make('elements.icon',['icon'=>'ellipsis-horizontal-outline','centered'=>false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </a>
                                <div class="dropdown-menu">
                                    <!-- Dropdown menu links -->
                                    <!-- TODO: Disable cancel url from UI if ccbill data link not present -->
                                    <?php if($subscription->status === \App\Model\Subscription::ACTIVE_STATUS && ($subscription->provider !== 'ccbill' || \App\Providers\SettingsServiceProvider::providedCCBillSubscriptionCancellingCredentials())): ?>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0)" onclick="SubscriptionsSettings.confirmSubCancelation(<?php echo e($subscription->id); ?>,<?php echo e($activeSubsTab == 'subscriptions' ? '"subscriptions"' : '"subscribers"'); ?>)">
                                            <?php echo $__env->make('elements.icon',['icon'=>'trash-outline','centered'=>false,'classes'=>'mr-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(__('Cancel subscription')); ?>

                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="d-flex flex-row-reverse mt-3 mr-4">
            <?php echo e($subscriptions->withQueryString()->onEachSide(1)->links()); ?>

        </div>
        <?php else: ?>
            <div class="p-3">
                <p><?php echo e(__('There are no active or cancelled subscriptions at the moment.')); ?></p>
            </div>
<?php endif; ?>

<?php echo $__env->make('elements.settings.transaction-cancel-dialog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/settings/settings-subscriptions.blade.php ENDPATH**/ ?>