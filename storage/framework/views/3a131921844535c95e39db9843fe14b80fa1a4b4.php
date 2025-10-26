<h5 class="mt-3"><?php echo e(__('Proceed with payment')); ?></h5>
<div class="input-group mb-3 mt-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="amount-label"><?php echo $__env->make('elements.icon',['icon'=>'cash-outline','variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></span>
    </div>
    <input class="form-control" placeholder="<?php echo e(\App\Providers\PaymentsServiceProvider::getDepositLimitAmounts()); ?>"
           aria-label="<?php echo e(__('Username')); ?>"
           aria-describedby="amount-label"
           id="deposit-amount"
           type="number"
           min="<?php echo e(\App\Providers\PaymentsServiceProvider::getDepositMinimumAmount()); ?>"
           step="1"
           max="<?php echo e(\App\Providers\PaymentsServiceProvider::getDepositMaximumAmount()); ?>">
    <div class="invalid-feedback"><?php echo e(__('Please enter a valid amount.')); ?></div>
</div>

<div>
    <div class="payment-method">
        <?php if(config('paypal.client_id') && config('paypal.secret')): ?>
            <div class="custom-control custom-radio mb-1">
                <input type="radio" id="customRadio1" name="payment-radio-option" class="custom-control-input"
                       value="payment-paypal">
                <label class="custom-control-label" for="customRadio1"><?php echo e(__("Paypal")); ?></label>
            </div>
        <?php endif; ?>
        <?php if(getSetting('payments.stripe_secret_key') && getSetting('payments.stripe_public_key')): ?>
            <div class="custom-control custom-radio mb-1">
                <input type="radio" id="customRadio2" name="payment-radio-option" class="custom-control-input"
                       value="payment-stripe">
                <label class="custom-control-label stepTooltip" for="customRadio2" title=""
                       data-original-title="<?php echo e(__('You need to login first')); ?>"><?php echo e(__("Stripe")); ?></label>
            </div>
        <?php endif; ?>
        <?php if(getSetting('payments.coinbase_api_key')): ?>
            <div class="custom-control custom-radio mb-1">
                <input type="radio" id="customRadio3" name="payment-radio-option" class="custom-control-input"
                       value="payment-coinbase">
                <label class="custom-control-label stepTooltip" for="customRadio3" title=""><?php echo e(__("Coinbase")); ?></label>
            </div>
        <?php endif; ?>
        <?php if(getSetting('payments.nowpayments_api_key')): ?>
            <div class="custom-control custom-radio mb-1">
                <input type="radio" id="customRadio5" name="payment-radio-option" class="custom-control-input"
                       value="payment-nowpayments">
                <label class="custom-control-label stepTooltip" for="customRadio5" title=""><?php echo e(__("NowPayments Crypto")); ?></label>
            </div>
        <?php endif; ?>
        <?php if(getSetting('payments.mercado_access_token')): ?>
            <div class="custom-control custom-radio mb-1">
                <input type="radio" id="customRadio6" name="payment-radio-option" class="custom-control-input" value="payment-mercado">
                <label class="custom-control-label stepTooltip" for="customRadio6" title=""><?php echo e(__("MercadoPago")); ?></label>
            </div>
        <?php endif; ?>
        <?php if(\App\Providers\PaymentsServiceProvider::ccbillCredentialsProvided()): ?>
            <div class="custom-control custom-radio mb-1">
                <input type="radio" id="customRadio6" name="payment-radio-option" class="custom-control-input"
                       value="payment-ccbill">
                <label class="custom-control-label stepTooltip" for="customRadio6" title=""><?php echo e(__("CCBill")); ?></label>
            </div>
        <?php endif; ?>
        <?php if(getSetting('payments.paystack_secret_key')): ?>
            <div class="custom-control custom-radio mb-1">
                <input type="radio" id="customRadio7" name="payment-radio-option" class="custom-control-input"
                       value="payment-paystack">
                <label class="custom-control-label stepTooltip" for="customRadio7" title=""><?php echo e(__("Paystack")); ?></label>
            </div>
        <?php endif; ?>
        <?php if(getSetting('payments.stripe_secret_key') && getSetting('payments.stripe_public_key') && getSetting('payments.stripe_oxxo_provider_enabled')): ?>
                <div class="custom-control custom-radio mb-1">
                    <input type="radio" id="customRadio8" name="payment-radio-option" class="custom-control-input"
                           value="payment-oxxo">
                    <label class="custom-control-label stepTooltip" for="customRadio8" title=""><?php echo e(__("Oxxo")); ?></label>
                </div>
        <?php endif; ?>
        <?php if(getSetting('payments.allow_manual_payments')): ?>
            <div class="custom-control custom-radio mb-1">
                <input type="radio" id="customRadio4" name="payment-radio-option" class="custom-control-input"
                       value="payment-manual">
                <label class="custom-control-label stepTooltip" for="customRadio4" title=""><?php echo e(__("Bank transfer")); ?></label>
            </div>
            <div class="manual-details d-none">
                <h5 class="mt-4 mb-3"><?php echo e(__("Add payment details")); ?></h5>

                <?php if(getSetting('payments.offline_payments_iban')): ?>
                <div class="alert alert-primary text-white font-weight-bold" role="alert">
                    <p class="mb-0"><?php echo e(__('Once confirmed, your credit will be available and you will be notified via email.')); ?></p>
                    <ul class="mt-2 mb-2">
                        <li><?php echo e(__('IBAN')); ?>: <span class="font-weight-bold"><?php echo e(getSetting('payments.offline_payments_iban')); ?></span></li>
                        <li><?php echo e(__('BIC/SWIFT')); ?>: <span class="font-weight-bold"><?php echo e(getSetting('payments.offline_payments_swift')); ?></span></li>
                        <li><?php echo e(__('Bank name')); ?>: <span class="font-weight-bold"><?php echo e(getSetting('payments.offline_payments_bank_name')); ?></span></li>
                        <li><?php echo e(__('Account owner')); ?>: <span class="font-weight-bold"><?php echo e(getSetting('payments.offline_payments_owner')); ?></span></li>
                        <li><?php echo e(__('Account number')); ?>: <span class="font-weight-bold"><?php echo e(getSetting('payments.offline_payments_account_number')); ?></span></li>
                        <li><?php echo e(__('Routing number')); ?>: <span class="font-weight-bold"><?php echo e(getSetting('payments.offline_payments_routing_number')); ?></span></li>
                    </ul>
                </div>
                <?php endif; ?>

                <?php if(getSetting('payments.offline_payments_custom_message_box')): ?>
                    <div class="alert alert-primary text-white font-weight-bold" role="alert">
                        <?php echo getSetting('payments.offline_payments_custom_message_box'); ?>

                    </div>
                <?php endif; ?>

                <div>
                    <label for="manualPaymentDescription" title=""><?php echo e(__("Notes")); ?></label>
                    <textarea class="form-control" id="manualPaymentDescription" rows="1"></textarea>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e(__("Payment notes are required")); ?></strong>
                    </span>
                </div>
                <p class="mb-1 mt-2"><?php echo e(__("Please attach clear photos with one the following: check, money order or bank transfer.")); ?></p>
                <div class="dropzone-previews dropzone manual-payment-uploader w-100 ppl-0 pr-0 pt-1 pb-1 border rounded"></div>
                <small class="form-text text-muted mb-2"><?php echo e(__("Allowed file types")); ?>: <?php echo e(str_replace(',',', ',AttachmentHelper::filterExtensions('manualPayments'))); ?>.</small>
                <div class="text-danger invalid-files d-none"><?php echo e(trans_choice('Please upload at least one file', (int)getSetting('payments.offline_payments_minimum_attachments_required'), ['num' => (int)getSetting('payments.offline_payments_minimum_attachments_required')])); ?></div>
            </div>
        <?php endif; ?>
    </div>
    <div class="payment-error error text-danger d-none mt-3"><?php echo e(__('Please select your payment method')); ?></div>
    <button class="btn btn-primary btn-block rounded mr-0 mt-4 deposit-continue-btn" type="submit"><?php echo e(__('Add funds')); ?></button>
</div>
<?php echo $__env->make('elements.uploaded-file-preview-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>




<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/settings/settings-wallet-deposit.blade.php ENDPATH**/ ?>