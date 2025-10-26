<?php $__env->startComponent('mail::layout'); ?>

<?php $__env->slot('header'); ?>
        <?php $__env->startComponent('mail::header', ['url' => config('app.url')]); ?>
            <!-- header here -->
            <img src="<?php echo e(asset(getSetting('site.light_logo'))); ?>" class="mail-logo" style="width:250px;">
        <?php echo $__env->renderComponent(); ?>
<?php $__env->endSlot(); ?>


<?php if(! empty($greeting)): ?>
# <?php echo e($greeting); ?>

<?php else: ?>
<?php if($level === 'error'): ?>
# <?php echo app('translator')->get('Whoops!'); ?>
<?php else: ?>
# <?php echo app('translator')->get('Hello!'); ?>
<?php endif; ?>
<?php endif; ?>


<?php $__currentLoopData = $introLines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php echo e($line); ?>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php if(isset($actionText)): ?>
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
<?php $__env->startComponent('mail::button', ['url' => $actionUrl, 'color' => $color]); ?>
<?php echo e($actionText); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>


<?php $__currentLoopData = $outroLines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php echo e($line); ?>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php if(! empty($salutation)): ?>
<?php echo e($salutation); ?>

<?php else: ?>
<?php echo app('translator')->get('Regards'); ?>,<br>
<?php echo e(getSetting('emails.from_name')); ?>

<?php endif; ?>


<?php if(isset($actionText)): ?>
<?php $__env->slot('subcopy'); ?>
<?php echo app('translator')->get(
    "If you’re having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
    'into your web browser:',
    [
        'actionText' => $actionText,
    ]
); ?> <span class="break-all">[<?php echo e($displayableActionUrl); ?>](<?php echo e($actionUrl); ?>)</span>
<?php $__env->endSlot(); ?>
<?php endif; ?>

<?php $__env->slot('footer'); ?>
    <?php $__env->startComponent('mail::footer'); ?>
        © <?php echo e(date('Y')); ?> <?php echo e(getSetting('emails.from_name')); ?>. <?php echo app('translator')->get('All rights reserved.'); ?>
<?php echo $__env->renderComponent(); ?>
<?php $__env->endSlot(); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/public_html/resources/views/vendor/notifications/email.blade.php ENDPATH**/ ?>