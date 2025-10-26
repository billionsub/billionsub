<footer class="app-footer">
    <div class="site-footer-right font-weight-bolder">
        © <?php echo e(date('Y')); ?> JustFans - <code>v<?php echo e(trim(file_get_contents(public_path('/version')))); ?></code>&nbsp; <span class="label label-<?php echo e(getLicenseType() == 'Unlicensed' ? 'warning' : 'success'); ?>"><?php echo e(getLicenseType()); ?></span>
    </div>
</footer>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/vendor/voyager/partials/app-footer.blade.php ENDPATH**/ ?>