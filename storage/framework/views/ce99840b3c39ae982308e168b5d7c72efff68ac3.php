<form action="<?php echo e(route('search.get')); ?>" class="search-filters-form w-100" method="GET">

    <div class="card rounded-lg mb-4">
        <div class="card-body">
            <div class="form-group">
                <label for="gender"><?php echo e(__('Gender')); ?></label>
                <select class="form-control" id="gender" name="gender" >
                    <option value="all"><?php echo e(__("All")); ?></option>
                    <?php $__currentLoopData = $genders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($gender->gender_name); ?>" <?php echo e($gender->gender_name == $searchFilters['gender'] ? 'selected' : ''); ?>><?php echo e(__($gender->gender_name)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('gender')): ?>
                    <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('gender')); ?></strong>
                </span>
                <?php endif; ?>
            </div>

            <div class="d-flex flex-row w-100">
                <div class="w-50 pr-2">
                    <div class="form-group">
                        <label for="min_age"><?php echo e(__('Min age')); ?></label>
                        <input class="form-control <?php echo e($errors->has('min_age') ? 'is-invalid' : ''); ?>" id="min_age" name="min_age" placeholder="18" type="number" min="18" value="<?php echo e($searchFilters['min_age']); ?>">
                        <?php if($errors->has('min_age')): ?>
                            <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('min_age')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="w-50 pl-2">
                    <div class="form-group">
                        <label for="max_age"><?php echo e(__('Max age')); ?></label>
                        <input class="form-control <?php echo e($errors->has('max_age') ? 'is-invalid' : ''); ?>" id="max_age" name="max_age" type="number" min="18" value="<?php echo e($searchFilters['max_age']); ?>">
                        <?php if($errors->has('max_age')): ?>
                            <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('max_age')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="location"><?php echo e(__('Location')); ?></label>
                <input class="form-control <?php echo e($errors->has('location') ? 'is-invalid' : ''); ?>" id="location" name="location" value="<?php echo e($searchFilters['location']); ?>">
                <?php if($errors->has('location')): ?>
                    <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('location')); ?></strong>
                </span>
                <?php endif; ?>
            </div>

            <input type="hidden" name="query" value="<?php echo e(isset($searchTerm) && $searchTerm ? $searchTerm : ''); ?>" />
            <input type="hidden" name="filter" value="<?php echo e(isset($activeFilter) && $activeFilter !== false ? $activeFilter : 'top'); ?>" />

        </div>
    </div>
</form>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/public_html/resources/views/elements/search/search-filters.blade.php ENDPATH**/ ?>