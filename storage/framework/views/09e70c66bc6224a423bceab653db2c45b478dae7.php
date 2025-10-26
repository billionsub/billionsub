
<div class="paymentOption paymentPP d-none">
    <form id="wallet-deposit" method="post" action="<?php echo e(route('payment.initiatePayment')); ?>" >
        <?php echo csrf_field(); ?>
        <input type="hidden" name="amount" id="wallet-deposit-amount" value="1">
        <input type="hidden" name="transaction_type" id="payment-type" value="">
        <input type="hidden" name="provider" id="provider" value="">
        <input type="hidden" name="manual_payment_files" id="manual-payment-files" value="">
        <input type="hidden" name="manual_payment_description" id="manual-payment-description" value="">

        <button class="payment-button" type="submit"></button>
    </form>
</div>

<div class="paymentOption ml-2 paymentStripe d-none">
    <button id="stripe-checkout-button"><?php echo e(__('Checkout')); ?></button>
</div>


<div>
    <?php echo $__env->make('elements/message-alert', ['classes' =>'mb-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="alert alert-primary text-white font-weight-bold" role="alert">
        <div class="d-flex"><h3 class="font-weight-bold wallet-total-amount"><?php echo e(\App\Providers\SettingsServiceProvider::getWebsiteFormattedAmount(number_format(Auth::user()->wallet->total, 2, '.', ''))); ?></h3> <small class="ml-2"></small> </div>
        <p class="mb-0"><?php echo e(__('Available funds. You can deposit more money or become a creator to earn more.')); ?></p>
    </div>

    <div class="mt-3 inline-border-tabs">
        <nav class="nav nav-pills nav-justified">
            <?php $__currentLoopData = \App\Providers\SettingsServiceProvider::allowWithdrawals(Auth::user()) ? ['deposit', 'withdraw'] : ['deposit']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="nav-item nav-link <?php echo e($activeTab == $tab ? 'active' : ''); ?>" href="<?php echo e(route('my.settings',['type' => 'wallet', 'active' => $tab])); ?>">

                    <div class="d-flex align-items-center justify-content-center">
                        <?php if($tab == 'deposit'): ?>
                            <?php echo $__env->make('elements.icon',['icon'=>'wallet','variant'=>'medium','classes'=>'mr-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php elseif(\App\Providers\SettingsServiceProvider::allowWithdrawals(Auth::user())): ?>
                            <?php echo $__env->make('elements.icon',['icon'=>'card','variant'=>'medium','classes'=>'mr-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <?php echo e(__(ucfirst($tab))); ?>


                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </nav>
    </div>

    <?php if($activeTab != null && $activeTab === 'withdraw' && \App\Providers\SettingsServiceProvider::allowWithdrawals(Auth::user())): ?>
        <?php echo $__env->make('elements/settings/settings-wallet-withdraw', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('elements/settings/settings-wallet-deposit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

</div>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/settings/settings-wallet.blade.php ENDPATH**/ ?>