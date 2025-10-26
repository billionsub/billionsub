<div class="px-3 new-post-comment-area">
    <div class="d-flex justify-content-center align-items-center">
        <img class="rounded-circle" src="<?php echo e(Auth::user()->avatar); ?>">
        <div class="input-group">
            <textarea name="message" class="form-control comment-textarea mr-2 ml-3 comment-text new-comment-textarea" placeholder="<?php echo e(__('Write a message..')); ?>"  onkeyup="textAreaAdjust(this)"></textarea>
            <span class="invalid-feedback pl-4 text-bold" role="alert"></span>
        </div>
        <div class="">
            <button class="btn btn-outline-primary btn-rounded-icon" onclick="Post.addComment(<?php echo e($post->id); ?>)">
                <div class="d-flex justify-content-center align-items-center">
                    <?php echo $__env->make('elements.icon',['icon'=>'paper-plane','variant'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </button>
        </div>
    </div>
</div>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/feed/post-new-comment.blade.php ENDPATH**/ ?>