<div class="input-group mb-3 mt-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="amount-label"><?php echo $__env->make('elements.icon',['icon'=>'cash-outline','variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></span>
    </div>
    <input class="form-control"
           placeholder="<?php echo e(\App\Providers\PaymentsServiceProvider::getWithdrawalAmountLimitations()); ?>"
           aria-label="Username"
           aria-describedby="amount-label"
           id="withdrawal-amount"
           type="number"
           min="<?php echo e(\App\Providers\PaymentsServiceProvider::getWithdrawalMinimumAmount()); ?>"
           step="1"
           max="<?php echo e(\App\Providers\PaymentsServiceProvider::getWithdrawalMaximumAmount()); ?>">
    <div class="invalid-feedback"><?php echo e(__('Please enter a valid amount')); ?></div>
    <div class="input-group mb-3 mt-3">
        <div class="d-flex flex-row w-100">
            <div class="form-group w-50 pr-2">
                <label for="paymentMethod"><?php echo e(__('Payment method')); ?></label>
                <select class="form-control" id="payment-methods" name="payment-methods">
                    <?php $__currentLoopData = \App\Providers\PaymentsServiceProvider::getWithdrawalsAllowedPaymentMethods(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentMethod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($paymentMethod); ?>"><?php echo e(__($paymentMethod)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group w-50 pl-2 update-stripe-connect-box d-none">
                <label id="update-stripe-connect-label" for="update-stripe-connect"><?php echo e(__('Update details')); ?></label>
                <a href="<?php echo e(route('withdrawals.onboarding')); ?>">
                    <button id="update-stripe-connect" class="btn btn-primary btn-block rounded mr-0"><?php echo e(__('Update')); ?></button>
                </a>
            </div>
            <div class="form-group w-50 pl-2 input-label">
                <label id="payment-identifier-label" for="withdrawal-payment-identifier"><?php echo e(__("Bank account")); ?></label>
                <input class="form-control" type="text" id="withdrawal-payment-identifier" name="payment-identifier">
            </div>
        </div>
        <div class="form-group w-100 input-message">
            <label for="withdrawal-message"><?php echo e(__('Message (Optional)')); ?></label>
            <textarea placeholder="<?php echo e(__('Bank account, notes, etc')); ?>" class="form-control" id="withdrawal-message" rows="2"></textarea>
            <span class="invalid-feedback" role="alert">
                <?php echo e(__('Please add your withdrawal notes: EG: Paypal or Bank account.')); ?>

            </span>
        </div>
    </div>
    <div class="stripe-connect-label d-none">
        <?php if(!Auth::user()->country_id): ?>
            <span><?php echo e(__("You must set the country on your profile before you can start onboarding and withdraw money")); ?></span>
        <?php elseif(!Auth::user()->stripe_onboarding_verified): ?>
            <span><?php echo e(__("We're using Stripe to get you paid quickly and keep your personal and payment information secure. Thousands of companies around the world trust Stripe to process payments for their users. Set up a Stripe account to get paid with us")); ?></span>
        <?php endif; ?>
    </div>
    <div class="payment-error error text-danger d-none mt-3"><?php echo e(__('Add all required info')); ?></div>
    <div class="stripe-connect-buttons d-none w-100">
        <?php if(!Auth::user()->country_id): ?>
            <div class="mt-3">
                <div>
                    <a href="<?php echo e(route('my.settings',['type'=>'profile'])); ?>">
                        <button class="btn btn-primary btn-block rounded mr-0"><?php echo e(__('Set your country')); ?></button>
                    </a>
                </div>
            </div>
        <?php elseif(!Auth::user()->stripe_onboarding_verified): ?>
            <div class="mt-3">
                <div>
                    <a href="<?php echo e(route('withdrawals.onboarding')); ?>">
                        <button class="btn btn-primary btn-block rounded mr-0"><?php echo e(!Auth::user()->stripe_account_id ? __('Start onboarding') : __('Update details')); ?></button>
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <button class="btn btn-primary btn-block rounded mr-0 withdrawal-continue-btn" type="submit"><?php echo e(__('Request withdrawal')); ?></button>
</div>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/settings/settings-wallet-withdrawal/withdrawal-input-container.blade.php ENDPATH**/ ?>