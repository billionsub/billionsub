<?php $__env->startSection('page_title', __('voyager::generic.viewing').' '.__('voyager::generic.settings')); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('css/admin-settings.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('/libs/@simonwep/pickr/dist/themes/nano.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_header'); ?>
    <h1 class="page-title">
        <i class="voyager-settings"></i> <?php echo e(__('voyager::generic.settings')); ?>

    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <div class="page-content settings container-fluid">

        <?php if(isset($storageErrorMessage) && $storageErrorMessage !== false): ?>
            <div class="storage-incorrect-bucket-config tab-additional-info">
                <div class="alert alert-warning alert-dismissible mb-1">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="info-label"><div class="icon voyager-info-circled"></div><strong><?php echo e(__("Warning!")); ?></strong> <?php echo e(__("The last storage settings you provided are invalid. Storage driver will reverted to local storage.")); ?></div>
                    <div class="mt-05"><?php echo e(__("Last error received:")); ?></div>
                    <pre><?php echo e($storageErrorMessage); ?></pre>
                </div>
            </div>
        <?php endif; ?>

        <?php if(isset($emailsErrorMessage) && $emailsErrorMessage !== false): ?>
            <div class="storage-incorrect-bucket-config tab-additional-info">
                <div class="alert alert-warning alert-dismissible mb-1">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="info-label"><div class="icon voyager-info-circled"></div><strong><?php echo e(__("Warning!")); ?></strong> <?php echo e(__("The email driver settings you provided are invalid. Email driver will reverted to logs.")); ?></div>
                    <div class="mt-05"><?php echo e(__("Last error received:")); ?></div>
                    <pre><?php echo e($emailsErrorMessage); ?></pre>
                </div>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('voyager.settings.update')); ?>" method="POST" enctype="multipart/form-data" class="save-settings-form">
            <?php echo e(method_field("PUT")); ?>

            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="setting_tab" class="setting_tab" value="<?php echo e($active); ?>" />
            <div class="panel">

                <div class="page-content settings container-fluid">
                    <ul class="nav nav-tabs">
                        <?php
                        $categoriesOrder = [
                            'Site',
                            'Profiles',
                            'Storage',
                            'Media',
                            'Feed',
                            'Payments',
                            'Websockets',
                            'Emails',
                            'Social login',
                            'Social links',
                            'Custom Code / Ads',
                            'Admin',
                            'Streams',
                            'Compliance',
                            'Security',
                            'Referrals',
                            'AI',
                            'Colors',
                        ];
                        $categories = [];
                        foreach($categoriesOrder as $category){
                            if(isset( $settings[$category])){
                                $categories[$category] = $settings[$category];
                            }
                        }
                        $settings = $categories;
                        ?>
                        <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($group != 'Colors' && $group != 'License'): ?>
                                <li <?php if($group == $active): ?> class="active" <?php endif; ?>>
                                    <a data-toggle="tab" class="settings-menu-<?php echo e(lcfirst($group)); ?>" href="#<?php echo e(\Illuminate\Support\Str::slug($group)); ?>"><?php echo e($group); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <li <?php if($group === $active && $active === 'Colors'): ?> class="active" <?php endif; ?>>
                            <a data-toggle="tab" href="#colors">Colors</a>
                        </li>
                        <li <?php if($group === $active && $active === 'License'): ?> class="active" <?php endif; ?>>
                            <a data-toggle="tab" href="#license">License</a>
                        </li>
                    </ul>

                    <div class="tab-content">

                        <?php echo $__env->make('vendor.voyager.settings.lcode', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('vendor.voyager.settings.colors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $group_settings): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div id="<?php echo e(\Illuminate\Support\Str::slug($group)); ?>" class="tab-pane fade in <?php if($group == $active): ?> active <?php endif; ?>">

                                <div class="tab-additional-info">
                                    <?php if($group == 'Emails'): ?>
                                        <div class="emails-info">
                                            <div class="alert alert-info alert-dismissible mb-1">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <div class="info-label mb-0"><div class="icon voyager-info-circled"></div> You can use any SMTP you have access to or mailgun API. Full info can be found over <a target="_blank" class="text-white" href="https://docs.qdev.tech/justfans/#emails">the documentation</a> .</div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($group == 'Social login'): ?>
                                        <div class="social-login-info">
                                            <div class="alert alert-info alert-dismissible mb-1">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <div class="info-label"><div class="icon voyager-info-circled"></div>Each of the social login provider will require you a <i><strong>"Callback Url"</strong></i>. Here are the endpoints that you will need to set up for each provider:</div>
                                                <ul>
                                                    <li><code>Facebook: <?php echo e(route('social.login.callback',['provider'=>'facebook'])); ?></code></li>
                                                    <li><code>Twitter: <?php echo e(route('social.login.callback',['provider'=>'twitter'])); ?></code></li>
                                                    <li><code>Google: <?php echo e(route('social.login.callback',['provider'=>'google'])); ?></code></li>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <?php if($group == 'Media'): ?>
                                    <div class="tab-additional-info">
                                        <div class="coconut-info d-none">

                                            <?php if(getSetting('storage.driver') == 'public'): ?>
                                                <div class="alert alert-warning alert-dismissible mb-1">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <div class="info-label mb-0"><div class="icon voyager-info-circled"></div><strong><?php echo e(__("Warning!")); ?></strong> <?php echo e(__("Coconut transcoding can only be used with a remote storage option. Local storage is not supported.")); ?></div>
                                                </div>
                                            <?php endif; ?>

                                            <?php if(!getSetting('websockets.pusher_app_id') && !getSetting('websockets.soketi_host_address')): ?>
                                                <div class="alert alert-warning alert-dismissible mb-1">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <div class="info-label mb-0"><div class="icon voyager-info-circled"></div><strong><?php echo e(__("Warning!")); ?></strong> <?php echo e(__("Coconut transcoding requires websockets to be enabled. Please check the configure your Websockets area.")); ?></div>
                                                </div>
                                            <?php endif; ?>

                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4 class="mb-4">Media settings</h4>

                                                <div class="tabbable-panel">
                                                    <div class="tabbable-line">
                                                        <ul class="nav nav-tabs ">
                                                            <li class="active">
                                                                <a href="#media-general" data-toggle="tab" onclick="Admin.mediaSettingsSubTabSwitch('general')">
                                                                    General </a>
                                                            </li>
                                                            <li>
                                                                <a href="#media-videos" data-toggle="tab" onclick="Admin.mediaSettingsSubTabSwitch('videos')">
                                                                    Videos </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if($group == 'Payments'): ?>

                                    <div class="tab-additional-info">
                                        <div class="payments-info">
                                            <?php if(!file_exists(storage_path('logs/cronjobs.log'))): ?>
                                                <div class="alert alert-info alert-dismissible mb-1 payments-info-crons">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <div class="info-label"><div class="icon voyager-dollar"></div>The payment system requires cronjobs so you can easily setup them by using the following line:</div>
                                                    <ul>
                                                        <li><code>* * * * * cd <?php echo e(base_path()); ?> && php artisan schedule:run >> /dev/null 2>&1</code></li>
                                                    </ul>
                                                    
                                                    <div class="mt-05">
                                                        Before setting up the payment processors, please also give the <a class="text-white" target="_blank" href="https://docs.qdev.tech/justfans/#payments">docs section</a> a read.
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <div class="alert alert-info alert-dismissible mb-1 payments-info-paypal d-none">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <div class="info-label"><div class="icon voyager-info-circled"></div> In order to be able to receive payment updates from Paypal, please use these webhooks endpoints:</div>
                                                <ul>
                                                    <li><code><?php echo e(route('paypal.payment.update')); ?></code></li>
                                                </ul>
                                                <div class="mt-05">
                                                    Before setting up the payment processors, please also give the <a class="text-white" target="_blank" href="https://docs.qdev.tech/justfans/#payments">docs section</a> a read.
                                                </div>
                                            </div>


                                            <div class="alert alert-info alert-dismissible mb-1 payments-info-stripe d-none">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <div class="info-label"><div class="icon voyager-info-circled"></div> In order to be able to receive payment updates from Stripe, please use these webhooks endpoints:</div>
                                                <ul>
                                                    <li><code><?php echo e(route('stripe.payment.update')); ?></code></li>
                                                </ul>
                                                <div class="mt-05">
                                                    Before setting up the payment processors, please also give the <a class="text-white" target="_blank" href="https://docs.qdev.tech/justfans/#payments">docs section</a> a read.
                                                </div>
                                            </div>

                                            <div class="alert alert-info alert-dismissible mb-1 payments-info-coinbase d-none">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <div class="info-label"><div class="icon voyager-info-circled"></div> In order to be able to receive payment updates from Coinbase, please use these webhooks endpoints:</div>
                                                <ul>
                                                    <li><code><?php echo e(route('coinbase.payment.update')); ?></code></li>
                                                </ul>
                                            </div>



                                            <div class="alert alert-info alert-dismissible mb-1 payments-info-ccbill d-none">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <div class="info-label"><div class="icon voyager-info-circled"></div> In order to use CCBill as payment provider you'll need the following endpoints:
                                                    <ul>
                                                        <li>Webhook URL: <code><?php echo e(route('ccBill.payment.update')); ?></code></li>
                                                        <li>Approval & Denial URL: <code><?php echo e(route('payment.checkCCBillPaymentStatus')); ?></code></li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="alert alert-info alert-dismissible mb-1 payments-info-paystack d-none">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <div class="info-label"><div class="icon voyager-info-circled"></div> In order to use Paystack as payment provider you'll need the following endpoints:</div>
                                                <ul>
                                                    <li>Webhook URL: <code><?php echo e(route('paystack.payment.update')); ?></code></li>
                                                    <li>Callback URL: <code><?php echo e(route('payment.checkPaystackPaymentStatus')); ?></code></li>
                                                </ul>
                                            </div>

                                            <div class="alert alert-info alert-dismissible mb-1 payments-info-mercado d-none">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <div class="info-label"><div class="icon voyager-info-circled"></div> In order to use Mercado as payment provider you'll need the following endpoint:</div>
                                                <ul>
                                                    <li>Webhook URL: <code><?php echo e(route('mercado.payment.update')); ?></code></li>
                                                </ul>
                                            </div>

                                            <div class="alert alert-info alert-dismissible mb-1 payments-info-nowpayments d-none">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <div class="info-label"><div class="icon voyager-info-circled"></div> In order to use NowPayments as payment provider you'll need the following endpoint:</div>
                                                <ul>
                                                    <li>IPN Callback URL: <code><?php echo e(route('nowPayments.payment.update')); ?></code></li>
                                                </ul>
                                            </div>

                                            <div class="alert alert-info alert-dismissible mb-1 payments-info-stripeConnect d-none">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <div class="info-label"><div class="icon voyager-info-circled"></div> In order to use StripeConnect as payment option for withdrawals you'll need the following endpoint:</div>
                                                <ul>
                                                    <li>Webhook URL: <code><?php echo e(route('stripeConnect.payment.update')); ?></code></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4 class="mb-4">Payments settings</h4>

                                                <div class="tabbable-panel">
                                                    <div class="tabbable-line">
                                                        <ul class="nav nav-tabs ">
                                                            <li class="active">
                                                                <a href="#payments-general" data-toggle="tab" onclick="Admin.paymentsSettingsSubTabSwitch('general')">
                                                                    General </a>
                                                            </li>
                                                            <li>
                                                                <a href="#payments-processors" data-toggle="tab" onclick="Admin.paymentsSettingsSubTabSwitch('processors')">
                                                                    Payment processors </a>
                                                            </li>
                                                            <li>
                                                                <a href="#payments-invoices" data-toggle="tab" onclick="Admin.paymentsSettingsSubTabSwitch('invoices')">
                                                                    Invoices </a>
                                                            </li>
                                                            <li>
                                                                <a href="#payments-withdrawals" data-toggle="tab" onclick="Admin.paymentsSettingsSubTabSwitch('withdrawals')">
                                                                    Withdrawals </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel-heading setting-row setting-payments.driver" data-settingkey="payments.driver">
                                        <h3 class="panel-title"> Payment processor  </h3>
                                    </div>
                                    <div class="panel-body no-padding-left-right setting-row setting-payments.driver" data-settingkey="payments.driver">
                                        <div class="col-md-12 no-padding-left-right">
                                            <select class="form-control" name="payments.driver" id="payments.driver">
                                                <option value="stripe">Stripe</option>
                                                <option value="paypal">Paypal</option>
                                                <option value="coinbase">Coinbase</option>
                                                <option value="nowpayments">NowPayments</option>
                                                <option value="ccbill">CCBill</option>
                                                <option value="offline">Offline payments</option>
                                                <option value="paystack">Paystack</option>
                                                <option value="mercado">MercadoPago</option>
                                            </select>

                                        </div>

                                    </div>
                                <?php endif; ?>

                                <?php $__currentLoopData = $group_settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="panel-heading setting-row setting-<?php echo e($setting->key); ?>" data-settingkey=<?php echo e($setting->key); ?>>
                                        <h3 class="panel-title">
                                            <?php echo e($setting->display_name); ?> <?php if(config('voyager.show_dev_tips')): ?><code>getSetting('<?php echo e($setting->key); ?>')</code><?php endif; ?>
                                        </h3>
                                    </div>

                                    <div class="panel-body no-padding-left-right setting-row setting-<?php echo e($setting->key); ?>" data-settingkey=<?php echo e($setting->key); ?>>
                                        <div class="col-md-12 no-padding-left-right">
                                            <?php if($setting->type == "text"): ?>
                                                <input type="text" class="form-control" name="<?php echo e($setting->key); ?>" value="<?php echo e($setting->value); ?>">
                                            <?php elseif($setting->type == "text_area"): ?>
                                                <textarea class="form-control" name="<?php echo e($setting->key); ?>"><?php echo e($setting->value ?? ''); ?></textarea>
                                            <?php elseif($setting->type == "rich_text_box"): ?>
                                                <textarea class="form-control richTextBox" name="<?php echo e($setting->key); ?>"><?php echo e($setting->value ?? ''); ?></textarea>
                                            <?php elseif($setting->type == "code_editor"): ?>
                                                <?php $options = json_decode($setting->details); ?>
                                                <div id="<?php echo e($setting->key); ?>" data-theme="<?php echo e(@$options->theme); ?>" data-language="<?php echo e(@$options->language); ?>" class="ace_editor min_height_400" name="<?php echo e($setting->key); ?>"><?php echo e($setting->value ?? ''); ?></div>
                                                <textarea name="<?php echo e($setting->key); ?>" id="<?php echo e($setting->key); ?>_textarea" class="hidden"><?php echo e($setting->value ?? ''); ?></textarea>
                                            <?php elseif($setting->type == "image" || $setting->type == "file"): ?>
                                                <?php if(isset( $setting->value ) && !empty( $setting->value ) /*&& Storage::disk(config('voyager.storage.disk'))->exists($setting->value)*/): ?>
                                                    <div class="img_settings_container">
                                                        <a href="<?php echo e(route('voyager.settings.delete_value', $setting->id)); ?>" class="voyager-x delete_value"></a>
                                                        <?php
                                                            $imageUrl = null;
                                                            $decodedValue = json_decode($setting->value, true);
                                                            if (is_array($decodedValue) && isset($decodedValue[0]['download_link'])) {
                                                                $imageUrl = Storage::disk(config('voyager.storage.disk'))->url($decodedValue[0]['download_link']);
                                                            } elseif (filter_var($setting->value, FILTER_VALIDATE_URL)) {
                                                                $imageUrl = Storage::disk(config('voyager.storage.disk'))->url($setting->value);
                                                            } else {
                                                                $imageUrl = Storage::disk(config('voyager.storage.disk'))->url($setting->value);
                                                            }
                                                            $imageUrl = urldecode($imageUrl);
                                                        ?>

                                                        <?php if($imageUrl): ?>
                                                            <img src="<?php echo e($imageUrl); ?>" class="setting-value-image">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                <?php elseif($setting->type == "file" && isset( $setting->value )): ?>
                                                    <?php if(json_decode($setting->value) !== null): ?>
                                                        <?php $__currentLoopData = json_decode($setting->value); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="fileType">
                                                                <a class="fileType" target="_blank" href="<?php echo e(Storage::disk(config('voyager.storage.disk'))->url($file->download_link)); ?>">
                                                                    <?php echo e($file->original_name); ?>

                                                                </a>
                                                                <a href="<?php echo e(route('voyager.settings.delete_value', $setting->id)); ?>" class="voyager-x delete_value"></a>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <input type="file" name="<?php echo e($setting->key); ?>">
                                            <?php elseif($setting->type == "select_dropdown"): ?>
                                                <?php $options = json_decode($setting->details); ?>
                                                <?php $selected_value = (isset($setting->value) && !empty($setting->value)) ? $setting->value : NULL; ?>
                                                <select class="form-control" name="<?php echo e($setting->key); ?>">
                                                    <?php $default = (isset($options->default)) ? $options->default : NULL; ?>
                                                    <?php if(isset($options->options)): ?>
                                                        <?php $__currentLoopData = $options->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($index); ?>" <?php if($default == $index && $selected_value === NULL): ?> selected="selected" <?php endif; ?> <?php if($selected_value == $index): ?> selected="selected" <?php endif; ?>><?php echo e($option); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>

                                            <?php elseif($setting->type == "radio_btn"): ?>
                                                <?php $options = json_decode($setting->details); ?>
                                                <?php $selected_value = (isset($setting->value) && !empty($setting->value)) ? $setting->value : NULL; ?>
                                                <?php $default = (isset($options->default)) ? $options->default : NULL; ?>
                                                <ul class="radio">
                                                    <?php if(isset($options->options)): ?>
                                                        <?php $__currentLoopData = $options->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li>
                                                                <input type="radio" id="option-<?php echo e($index); ?>" name="<?php echo e($setting->key); ?>"
                                                                       value="<?php echo e($index); ?>" <?php if($default == $index && $selected_value === NULL): ?> checked <?php endif; ?> <?php if($selected_value == $index): ?> checked <?php endif; ?>>
                                                                <label for="option-<?php echo e($index); ?>"><?php echo e($option); ?></label>
                                                                <div class="check"></div>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </ul>
                                            <?php elseif($setting->type == "checkbox"): ?>
                                                <?php $options = json_decode($setting->details); ?>
                                                <?php $checked = (isset($setting->value) && $setting->value == 1) ? true : false; ?>
                                                <?php if(isset($options->on) && isset($options->off)): ?>
                                                    <input type="checkbox" name="<?php echo e($setting->key); ?>" class="toggleswitch" <?php if($checked): ?> checked <?php endif; ?> data-on="<?php echo e($options->on); ?>" data-off="<?php echo e($options->off); ?>">
                                                <?php else: ?>
                                                    <input type="checkbox" name="<?php echo e($setting->key); ?>" <?php if($checked): ?> checked <?php endif; ?> class="toggleswitch">
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="d-none">
                                            <select class="form-control group_select" name="<?php echo e($setting->key); ?>_group">
                                                <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($group); ?>" <?php echo $setting->group == $group ? 'selected' : ''; ?>><?php echo e($group); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                    </div>
                                    <?php
                                    $settingDetails = json_decode($setting->details);
                                    $hasDescription = false;
                                    if(isset($settingDetails->description)){
                                        $hasDescription = true;
                                    }
                                    ?>
                                    <?php if($hasDescription): ?>
                                        <div class="admin-setting-description setting-row setting-<?php echo e($setting->key); ?>" data-settingkey=<?php echo e($setting->key); ?>>
                                            <code>
                                                <?php echo e($settingDetails->description); ?>

                                            </code>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(!$loop->last): ?>
                                        <hr class="setting-row setting-<?php echo e($setting->key); ?>" data-settingkey=<?php echo e($setting->key); ?>>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-primary pull-right"><?php echo e(__('voyager::settings.save')); ?></button>
        </form>

        <div class="clearfix"></div>


    </div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script type="text/javascript" src="<?php echo e(asset('/libs/@simonwep/pickr/dist/pickr.es5.min.js')); ?>"></script>
    <script>
        $('document').ready(function () {
            $('#toggle_options').on('click', function () {
                $('.new-settings-options').toggle();
                if ($('#toggle_options .voyager-double-down').length) {
                    $('#toggle_options .voyager-double-down').removeClass('voyager-double-down').addClass('voyager-double-up');
                } else {
                    $('#toggle_options .voyager-double-up').removeClass('voyager-double-up').addClass('voyager-double-down');
                }
            });

            $('.toggleswitch').bootstrapToggle();

            $('[data-toggle="tab"]').on('click', function() {
                $(".setting_tab").val($(this).html());
            });

            $('.delete_value').on('click', function(e) {
                e.preventDefault();
                $(this).closest('form').attr('action', $(this).attr('href'));
                $(this).closest('form').submit();
            });

            // Initiliaze rich text editor
            tinymce.init(window.voyagerTinyMCE.getConfig());
        });
    </script>
    <script type="text/javascript">
        $(".group_select").not('.group_select_new').select2({
            tags: true,
            width: 'resolve'
        });
        $(".group_select_new").select2({
            tags: true,
            width: 'resolve',
            placeholder: '<?php echo e(__("voyager::generic.select_group")); ?>'
        });
        $(".group_select_new").val('').trigger('change');
    </script>
    <iframe id="form_target" name="form_target" class="d-none"></iframe>
    <form class="settings-upload" id="my_form" action="<?php echo e(route('voyager.upload')); ?>" target="form_target" method="POST" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <input name="image" id="upload_file" type="file" onchange="$('#my_form').submit();this.value='';">
        <input type="hidden" name="type_slug" id="type_slug" value="settings">
    </form>

    <script>
        try{
            var options_editor = ace.edit('options_editor');
            options_editor.getSession().setMode("ace/mode/json");

            var options_textarea = document.getElementById('options_textarea');
            options_editor.getSession().on('change', function() {
                console.log(options_editor.getValue());
                options_textarea.value = options_editor.getValue();
            });
        } catch (e) {
            // eslint-disable-next-line no-console
            console.warn(e);
        }

        var site_settings = {
            'emails.driver': "<?php echo e(getSetting('emails.driver')); ?>",
            'storage.driver': "<?php echo e(getSetting('storage.driver')); ?>",
            'websockets.driver': "<?php echo e(getSetting('websockets.driver')); ?>",
            'transcoding.driver': "<?php echo e(getSetting('media.transcoding_driver')); ?>",
            'colors.theme_color_code': "<?php echo e(getSetting('colors.theme_color_code')); ?>",
            'colors.theme_gradient_from': "<?php echo e(getSetting('colors.theme_gradient_from')); ?>",
            'colors.theme_gradient_to': "<?php echo e(getSetting('colors.theme_gradient_to')); ?>",
            'license.product_license_key': "<?php echo e(getSetting('license.product_license_key')); ?>",
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('voyager::master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/vendor/voyager/settings/index.blade.php ENDPATH**/ ?>