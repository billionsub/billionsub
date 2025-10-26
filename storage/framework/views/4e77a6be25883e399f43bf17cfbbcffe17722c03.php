<div class="modal fade" tabindex="-1" role="dialog" id="language-selector-dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('Change language')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><?php echo e(__('Select the language you want to use.')); ?></p>
                <div class="input-group">
                    <select class="form-control" id="language_code" name="language_code" >
                        <?php $__currentLoopData = LocalesHelper::getAvailableLanguages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $languageCode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(LocalesHelper::getLanguageName($languageCode)): ?>
                                <option value="<?php echo e($languageCode); ?>" <?php echo e(LocalesHelper::getUserPreferredLocale(request()) == $languageCode ? 'selected' : ''); ?>><?php echo e(ucfirst(__(LocalesHelper::getLanguageName($languageCode)))); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <div>
                </div>
                <div>
                    <button type="button" class="btn btn-primary mb-0" onclick="setUserLanguage()"><?php echo e(__('Save')); ?></button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/public_html/resources/views/elements/language-selector-box.blade.php ENDPATH**/ ?>