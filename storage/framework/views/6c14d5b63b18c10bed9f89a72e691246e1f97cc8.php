<div class="modal fade" tabindex="-1" role="dialog" id="stream-details-dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('How to stream')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo e(__('Close')); ?>">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <p><?php echo e(__('Your stream server is online. In order to get going, follow the steps below:')); ?></p>


                <div class="mt-3 inline-border-tabs">
                    <nav class="nav nav-pills nav-justified" role="tablist">
                        <a class="nav-link active"  data-toggle="tab" data-target="#nav-desktop" type="button" role="tab" aria-controls="nav-desktop" aria-selected="true">
                            <div class="d-flex align-items-center justify-content-center">
                                <?php echo $__env->make('elements.icon',['icon'=>'laptop-outline','variant'=>'small','classes'=>'mr-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo e(__("Desktop")); ?>

                            </div>
                        </a>
                        <a class="nav-link"  data-toggle="tab" data-target="#nav-mobile" type="button" role="tab" aria-controls="nav-mobile" aria-selected="true">
                            <div class="d-flex align-items-center justify-content-center">
                                <?php echo $__env->make('elements.icon',['icon'=>'phone-portrait-outline','variant'=>'small','classes'=>'mr-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo e(__("Mobile")); ?>

                            </div>
                        </a>
                    </nav>
                </div>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-desktop" role="tabpanel">
                        <div class="mt-2">
                            <ol class="py-3">
                                <li class="mb-1"><?php echo e(__('Download')); ?> <a href="https://obsproject.com/download" target="_blank">OBS</a> <?php echo e(__('for desktop or mobile alternatives.')); ?></li>
                                <li class="mb-1"><?php echo e(__('Go to')); ?> <code><?php echo e(__("Settings > Stream")); ?></code>. <?php echo e(__('For')); ?> <code><?php echo e(__("Service")); ?></code>, <?php echo e(__('select')); ?> <code><?php echo e(__("Custom")); ?></code>.</li>
                                <li class="mb-1"><?php echo e(ucfirst(__('for the'))); ?> <code><?php echo e(__("Server & Stream key")); ?></code>, <?php echo e(__('use the values below.')); ?></li>
                            </ol>
                            <div class="form-group row ">
                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-md"><?php echo e(__('Stream url')); ?></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control form-control-md" id="stream-url" placeholder="<?php echo e(__('Stream url')); ?>">
                                </div>
                                <div class="col-sm-auto d-flex align-items-center justify-content-center">
                            <span class="h-pill h-pill-accent rounded mr-2" onclick="Streams.copyStreamData('url')">
                                <?php echo $__env->make('elements.icon',['icon'=>'copy-outline'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-md"><?php echo e(__('Stream key')); ?></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control form-control-md" id="stream-key" placeholder="<?php echo e(__('Stream key')); ?>">
                                </div>
                                <div class="col-sm-auto d-flex align-items-center justify-content-center">
                            <span class="h-pill h-pill-accent rounded mr-2" onClick="Streams.copyStreamData('key');">
                                <?php echo $__env->make('elements.icon',['icon'=>'copy-outline'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-mobile" role="tabpanel" >
                        <div class="mt-2">
                            <ol class="py-3">
                                <li class="mb-1"><?php echo e(__('Download')); ?> <?php echo e(__("Larix for")); ?> <a href="https://apps.apple.com/us/app/larix-broadcaster/id1042474385" target="_blank">iOS</a> <?php echo e(__("or")); ?> <a href="https://play.google.com/store/apps/details?id=com.wmspanel.larix_broadcaster&hl=en&gl=US" target="_blank">Android</a>.</li>
                                <li class="mb-1"><?php echo e(__('Go to')); ?> <code><?php echo e(__("Settings > Connection > New connection")); ?></code>.</li>
                                <li class="mb-1"><?php echo e(ucfirst(__('for the'))); ?> <code>URL</code>, <?php echo e(__("use the following value")); ?>.</li>
                            </ol>
                            <div class="form-group row ">
                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-md"><?php echo e(__('Stream url')); ?></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control form-control-md" id="stream-url-larix" placeholder="<?php echo e(__('Stream url')); ?>">
                                </div>
                                <div class="col-sm-auto d-flex align-items-center justify-content-center">
                            <span class="h-pill h-pill-accent rounded mr-2" onclick="Streams.copyStreamData('mobile-url')">
                                <?php echo $__env->make('elements.icon',['icon'=>'copy-outline'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo e(__('Got it')); ?></button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/streams/stream-details-dialog.blade.php ENDPATH**/ ?>