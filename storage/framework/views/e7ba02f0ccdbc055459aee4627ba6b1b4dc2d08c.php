<div class="modal fade" tabindex="-1" role="dialog" id="qr-code-dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('Username QR Code',['username'=>$user->username])); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex justify-content-center">
                <div id="qrcode"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="Profile.downloadQRCode()"><?php echo e(__('Download')); ?></button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/profile/qr-code-dialog.blade.php ENDPATH**/ ?>