<?php if(Session::has('error') || Session::has('success') || Session::has('warning')): ?>
    <div class="alert-box <?php echo e(isset($classes) ? $classes : ''); ?>">
<?php endif; ?>
<?php if(Session::has('error')): ?>
    <div class="error-message alert text-white alert-danger alert-success mb-0">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <?php echo e(Session::get("error")); ?>

    </div>
<?php endif; ?>

<?php if(Session::has('success')): ?>
    <div class="alert text-white alert-dismissible alert-success mb-0">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <?php echo e(Session::get("success")); ?>

    </div>
<?php endif; ?>

<?php if(Session::has('warning')): ?>
    <div class="alert text-white alert-dismissible alert-warning mb-0">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <?php echo e(Session::get("warning")); ?>

    </div>
<?php endif; ?>

<?php if(Session::has('error') || Session::has('success') || Session::has('warning')): ?>
    </div>
<?php endif; ?>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/message-alert.blade.php ENDPATH**/ ?>