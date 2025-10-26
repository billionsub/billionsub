<?php if(count($payments)): ?>
    <div class="table-wrapper ">
        <div class="">
            <div class="col d-flex align-items-center py-3 border-bottom text-bold">
                <div class="col-lg-3 text-truncate"><?php echo e(__('Type')); ?></div>
                <div class="col-lg-2 text-truncate"><?php echo e(__('Status')); ?></div>
                <div class="col-lg-2 text-truncate"><?php echo e(__('Amount')); ?></div>
                <div class="col-lg-2 text-truncate d-none d-md-block"><?php echo e(__('From')); ?></div>
                <div class="col-lg-2 text-truncate d-none d-md-block"><?php echo e(__('To')); ?></div>
                <div class="col-lg-1 text-truncate"></div>
            </div>
            <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col d-flex align-items-center py-3 border-bottom">
                    <div class="col-lg-3 text-truncate">
                        <?php if($payment->type == 'stream-access'): ?>
                            <?php if($payment->stream->status == 'in-progress'): ?>
                                <a href="<?php echo e(route('public.stream.get',['streamID'=>$payment->stream->id,'slug'=>$payment->stream->slug])); ?>" class="text-<?php echo e((Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme') == 'dark' ? 'white' : 'dark') : (Cookie::get('app_theme') == 'dark' ? 'white' : 'dark'))); ?>"> <?php echo e(ucfirst(__($payment->type))); ?></a>
                            <?php else: ?>
                                <?php if($payment->stream->settings['dvr'] && $payment->stream->vod_link): ?>
                                    <a href="<?php echo e(route('public.vod.get',['streamID'=>$payment->stream->id,'slug'=>$payment->stream->slug])); ?>" class="text-<?php echo e((Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme') == 'dark' ? 'white' : 'dark') : (Cookie::get('app_theme') == 'dark' ? 'white' : 'dark'))); ?>"> <?php echo e(ucfirst(__($payment->type))); ?></a>
                                <?php else: ?>
                                    <span data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Stream VOD unavailable')); ?>"><?php echo e(ucfirst(__($payment->type))); ?></span>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php elseif($payment->type == 'post-unlock'): ?>
                            <a  href="<?php echo e(route('posts.get',['post_id'=>$payment->post->id,'username'=>$payment->receiver->username])); ?>" class="text-<?php echo e((Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme') == 'dark' ? 'white' : 'dark') : (Cookie::get('app_theme') == 'dark' ? 'white' : 'dark'))); ?>"><?php echo e(ucfirst(__($payment->type))); ?></a>
                        <?php elseif($payment->type == 'tip'): ?>
                            <?php echo e(ucfirst(__($payment->type))); ?>

                            <?php if($payment->post_id): ?>
                                (<a  href="<?php echo e(route('posts.get',['post_id'=>$payment->post->id,'username'=>$payment->receiver->username])); ?>" class="text-<?php echo e((Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme') == 'dark' ? 'white' : 'dark') : (Cookie::get('app_theme') == 'dark' ? 'white' : 'dark'))); ?>"><?php echo e(__("Post")); ?></a>)
                            <?php elseif($payment->stream_id): ?>
                                <?php if($payment->stream->status == 'in-progress'): ?>
                                    <a href="<?php echo e(route('public.stream.get',['streamID'=>$payment->stream->id,'slug'=>$payment->stream->slug])); ?>" class="text-<?php echo e((Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme') == 'dark' ? 'white' : 'dark') : (Cookie::get('app_theme') == 'dark' ? 'white' : 'dark'))); ?>"> (<?php echo e(__("Stream")); ?>)</a>
                                <?php else: ?>
                                    <?php if($payment->stream->settings['dvr'] && $payment->stream->vod_link): ?>
                                        <a href="<?php echo e(route('public.vod.get',['streamID'=>$payment->stream->id,'slug'=>$payment->stream->slug])); ?>" class="text-<?php echo e((Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme') == 'dark' ? 'white' : 'dark') : (Cookie::get('app_theme') == 'dark' ? 'white' : 'dark'))); ?>"> (<?php echo e(__("Stream")); ?>)</a>
                                    <?php else: ?>
                                        <span data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Stream VOD unavailable')); ?>">(<?php echo e(__("Stream")); ?>)</span>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php else: ?>
                                (<?php echo e(__("User")); ?>)
                            <?php endif; ?>

                            <?php else: ?>
                            <?php echo e(ucfirst(__($payment->type))); ?>

                        <?php endif; ?>
                    </div>

                    <div class="col-lg-2">
                        <?php switch($payment->status):
                            case ('approved'): ?>
                            <span class="badge badge-success">
                                <?php echo e(ucfirst(__($payment->status))); ?>

                            </span>
                            <?php break; ?>
                            <?php case ('initiated'): ?>
                            <?php case ('pending'): ?>
                            <span class="badge badge-info">
                                <?php echo e(ucfirst(__($payment->status))); ?>

                            </span>
                            <?php break; ?>
                            <?php case ('canceled'): ?>
                            <?php case ('refunded'): ?>
                            <span class="badge badge-warning">
                                <?php echo e(ucfirst(__($payment->status))); ?>

                            </span>
                            <?php break; ?>
                            <?php case ('partially-paid'): ?>
                            <span class="badge badge-primary">
                                <?php echo e(ucfirst(__($payment->status))); ?>

                            </span>
                            <?php break; ?>
                            <?php case ('declined'): ?>
                            <span class="badge badge-danger">
                                <?php echo e(ucfirst(__($payment->status))); ?>

                            </span>
                            <?php break; ?>
                        <?php endswitch; ?>
                    </div>
                    <div class="col-lg-2 text-truncate"><?php echo e($payment->decodedTaxes && Auth::user()->id == $payment->recipient_user_id ? \App\Providers\SettingsServiceProvider::getWebsiteFormattedAmount($payment->amount - $payment->decodedTaxes->taxesTotalAmount) : \App\Providers\SettingsServiceProvider::getWebsiteFormattedAmount($payment->amount)); ?></div>
                    <div class="col-lg-2 text-truncate d-none d-md-block">
                        <a href="<?php echo e(route('profile',['username'=>$payment->sender->username])); ?>" class="text-dark-r">
                            <?php echo e($payment->sender->name); ?>

                        </a>
                    </div>
                    <div class="col-lg-2 text-truncate d-none d-md-block">
                        <a href="<?php echo e(route('profile',['username'=>$payment->receiver->username])); ?>" class="text-dark-r">
                            <?php echo e($payment->receiver->name); ?>

                        </a>
                    </div>
                    <div class="col-lg-1 d-flex justify-content-center">
                        <?php if($payment->invoice_id && $payment->receiver->id !== \Illuminate\Support\Facades\Auth::user()->id && $payment->status === \App\Model\Transaction::APPROVED_STATUS): ?>
                            <div class="dropdown <?php echo e(GenericHelper::getSiteDirection() == 'rtl' ? 'dropright' : 'dropleft'); ?>">
                                <a class="btn btn-sm text-dark-r text-hover btn-outline-<?php echo e((Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme') == 'dark' ? 'dark' : 'light') : (Cookie::get('app_theme') == 'dark' ? 'dark' : 'light'))); ?> dropdown-toggle m-0 py-1 px-2" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $__env->make('elements.icon',['icon'=>'ellipsis-horizontal-outline','centered'=>false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </a>
                                <div class="dropdown-menu">
                                    <!-- Dropdown menu links -->
                                    <a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('invoices.get', ['id' => $payment->invoice_id])); ?>">
                                        <?php echo $__env->make('elements.icon',['icon'=>'document-outline','centered'=>false,'classes'=>'mr-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(__('View invoice')); ?>

                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="d-flex flex-row-reverse mt-3 mr-4">
        <?php echo e($payments->onEachSide(1)->links()); ?>

    </div>
<?php else: ?>
    <div class="p-3">
        <p><?php echo e(__('There are no payments on this account.')); ?></p>
    </div>
<?php endif; ?>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/settings/settings-payments.blade.php ENDPATH**/ ?>