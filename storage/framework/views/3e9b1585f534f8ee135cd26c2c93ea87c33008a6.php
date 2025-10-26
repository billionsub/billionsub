<?php $__env->startSection('page_title', __('Your live streams')); ?>

<?php $__env->startSection('styles'); ?>
    <?php echo Minify::stylesheet([
            '/libs/dropzone/dist/dropzone.css',
            '/css/pages/stream.css',
         ])->withFullUrl(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo Minify::javascript([
            '/libs/dropzone/dist/dropzone.js',
            '/js/FileUpload.js',
            '/js/pages/streams.js',
            '/js/suggestions.js',
         ])->withFullUrl(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-12">
            <div class="pt-4 d-flex justify-content-between align-items-center px-3 pb-3 border-bottom">
                <div>
                    <h5 class="text-truncate text-bold mb-0 <?php echo e((Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme') == 'dark' ? '' : 'text-dark-r') : (Cookie::get('app_theme') == 'dark' ? '' : 'text-dark-r'))); ?>"><?php echo e(__('Streams')); ?></h5>
                </div>
                <div class="d-flex">
                    <div class="stream-on-label w-100 <?php echo e(StreamsHelper::getUserInProgressStream() ? '' : 'd-none'); ?>">
                        <button class="btn btn-outline-danger btn-sm px-3 mb-0 d-flex align-items-center">
                            <div class="mr-1"><?php echo e(__("Streaming")); ?></div>
                            <div><div class="blob red"></div></div>
                        </button>
                    </div>

                    <div class="stream-off-label w-100 <?php echo e(StreamsHelper::getUserInProgressStream() ? 'd-none' : ''); ?>">
                        <button class="btn btn-outline-danger btn-sm px-3 mb-0 d-flex align-items-center <?php echo e(!GenericHelper::isUserVerified() && getSetting('site.enforce_user_identity_checks') ? 'disabled' : ''); ?>" onclick="<?php echo e(!GenericHelper::isUserVerified() && getSetting('site.enforce_user_identity_checks') ? '' : "Streams.showStreamEditDialog('create')"); ?>" data-toggle="<?php echo e(!GenericHelper::isUserVerified() && getSetting('site.enforce_user_identity_checks') ? 'none' : 'tooltip'); ?>" data-placement="top" title="<?php echo e(__('Go live')); ?>">
                            <div class="mr-1"><?php echo e(__("New stream")); ?></div>
                            <div> <?php echo $__env->make('elements.icon',['icon'=>'ellipse','variant'=>'','classes'=>'flex-shrink-0 text-danger'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
                        </button>
                    </div>

                </div>
            </div>

            <div class="px-3 pt-3">
                <?php if(!GenericHelper::isUserVerified() && getSetting('site.enforce_user_identity_checks')): ?>
                    <div class="alert alert-warning text-white font-weight-bold mt-2 mb-4" role="alert">
                        <?php echo e(__("Before being able to start a new stream, you need to complete your")); ?> <a class="text-white" href="<?php echo e(route('my.settings',['type'=>'verify'])); ?>"><?php echo e(__("profile verification")); ?></a>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <div class="card py-3 px-3">
                    <p class="h6 text-bolder mb-2 text-bold-600"><?php echo e(__("Active streams")); ?></p>
                    <div class="lists-wrapper mt-<?php echo e(StreamsHelper::getUserInProgressStream() ? '2' : '0'); ?> active-stream-container">
                        <?php if(StreamsHelper::getUserInProgressStream()): ?>
                            <?php echo $__env->make('elements.streams.stream-element',['stream'=>$activeStream, 'isLive' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php else: ?>
                            <span><?php echo e(__("There are no active streams. Click the button above to start a new one.")); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card py-3 px-3 my-4">
                    <p class="h6 text-bolder mb-2 text-bold-600"><?php echo e(__("Previous streams")); ?></p>
                    <?php if($previousStreams->count()): ?>
                        <div class="lists-wrapper mt-2">
                            <?php $__currentLoopData = $previousStreams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stream): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make('elements.streams.stream-element',['stream'=>$stream, 'isLive' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($previousStreams->total() > 6): ?>
                                <div class="d-flex flex-row-reverse mt-3 mr-4">
                                    <?php echo e($previousStreams->onEachSide(1)->links()); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <span><?php echo e(__("There are no previous streams.")); ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
    <?php echo $__env->make('elements.streams.stream-create-update-dialog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('elements.streams.stream-stop-dialog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('elements.streams.stream-delete-dialog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('elements.streams.stream-details-dialog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('elements.dropzone-dummy-element', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(getSetting('ai.open_ai_enabled')): ?>
        <?php echo $__env->make('elements.suggest-description', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user-no-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/pages/streams.blade.php ENDPATH**/ ?>