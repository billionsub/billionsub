<?php if(Session::get('impersonated')): ?>
    <div class="content text-center block bg-gradient-faded-primary text-dark py-3">
        <span class="font-weight-bold text-white"><?php echo e(__("You're logged as")); ?>: <?php echo e(\Illuminate\Support\Facades\Auth::user()->name); ?></span>
        <a href="<?php echo e(route('admin.leaveImpersonation')); ?>" class="font-weight-light text-white"><?php echo e(__('Leave impersonation')); ?></a>
    </div>
<?php endif; ?>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/impersonation-header.blade.php ENDPATH**/ ?>