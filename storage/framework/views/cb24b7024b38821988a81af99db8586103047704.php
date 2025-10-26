<?php $__env->startSection('page_title', __('New post')); ?>

<?php $__env->startSection('styles'); ?>
    <?php echo Minify::stylesheet([
            '/css/posts/post.css',
            '/libs/dropzone/dist/dropzone.css',
         ])->withFullUrl(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo Minify::javascript([
            '/js/Post.js',
            '/js/posts/create-helper.js',
            '/js/suggestions.js',
            (Route::currentRouteName() =='posts.create' ? '/js/posts/create.js' : '/js/posts/edit.js'),
            '/libs/dropzone/dist/dropzone.js',
            '/js/FileUpload.js',
         ])->withFullUrl(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-12">
            <?php echo $__env->make('elements.uploaded-file-preview-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('elements.post-price-setup',['postPrice'=>(isset($post) ? $post->price : 0)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('elements.attachments-uploading-dialog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('elements.post-schedule-setup', isset($post) ? ['release_date' => $post->release_date,'expire_date' => $post->expire_date] : [], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="d-flex justify-content-between pt-4 pb-3 px-3 border-bottom">
                <h5 class="text-truncate text-bold  <?php echo e((Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme') == 'dark' ? '' : 'text-dark-r') : (Cookie::get('app_theme') == 'dark' ? '' : 'text-dark-r'))); ?>"><?php echo e(Route::currentRouteName() == 'posts.create' ? __('New post') : __('Edit post')); ?></h5>
            </div>
            <?php if(!PostsHelper::getDefaultPostStatus(Auth::user()->id)): ?>
                <div class="pl-3 pr-3 pt-3">
                    <?php echo $__env->make('elements.pending-posts-warning-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endif; ?>
            <div class="pl-3 pr-3 pt-2">
                <?php if(!GenericHelper::isUserVerified() && getSetting('site.enforce_user_identity_checks')): ?>
                    <div class="alert alert-warning text-white font-weight-bold mt-2 mb-0" role="alert">
                        <?php echo e(__("Before being able to publish an item, you need to complete your")); ?> <a class="text-white" href="<?php echo e(route('my.settings',['type'=>'verify'])); ?>"><?php echo e(__("profile verification")); ?></a>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <div class="d-flex flex-column-reverse">
                    <div class="w-100">
                        <textarea  id="dropzone-uploader" name="input-text" class="form-control border dropzone w-100" rows="3" spellcheck="false" placeholder="<?php echo e(__('Write a new post, drag and drop files to add attachments.')); ?>" value="<?php echo e(isset($post) ? $post->text : ''); ?>"></textarea>
                        <span class="invalid-feedback" role="alert">
                            <strong class="post-invalid-feedback"><?php echo e(__('Your post must contain more than 10 characters.')); ?></strong>
                        </span>

                        <div class="d-flex justify-content-between w-100 mb-3 mt-3">
                            <div class="flex-md-grow-1">
                                <div>
                                    <?php echo $__env->make('elements.post-create-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                            <div class="">
                                <div class="d-flex align-items-center justify-content-center">
                                    <?php if(Route::currentRouteName() == 'posts.create'): ?>
                                        <div class="">
                                            <a href="#" class="draft-clear-button mr-3 mr-md-3"><?php echo e(__('Clear draft')); ?></a>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(!GenericHelper::isUserVerified() && getSetting('site.enforce_user_identity_checks')): ?>
                                        <button class="btn btn-outline-primary disabled mb-0"><?php echo e(__('Save')); ?></button>
                                    <?php else: ?>
                                        <button class="btn btn-outline-primary post-create-button mb-0"><?php echo e(__('Save')); ?></button>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="dropzone-previews dropzone w-100 ppl-0 pr-0 pt-1 pb-1"></div>
                </div>
            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user-no-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/pages/create.blade.php ENDPATH**/ ?>