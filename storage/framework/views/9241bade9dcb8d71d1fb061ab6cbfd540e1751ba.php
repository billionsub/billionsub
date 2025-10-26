<?php if(!Auth::user()->email_verified_at): ?> <?php echo $__env->make('elements.resend-verification-email-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php endif; ?>

<?php if(getSetting('ai.open_ai_enabled')): ?>
    <?php echo $__env->make('elements.suggest-description', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<form method="POST" action="<?php echo e(route('my.settings.profile.save',['type'=>'profile'])); ?>">
    <?php echo csrf_field(); ?>
    <?php echo $__env->make('elements.dropzone-dummy-element', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="mb-4">
        <div class="">
            <div class="card profile-cover-bg">
                <img class="card-img-top centered-and-cropped" src="<?php echo e(Auth::user()->cover); ?>">
                <div class="card-img-overlay d-flex justify-content-center align-items-center">
                    <div class="actions-holder d-none">

                        <div class="d-flex">
                        <span class="h-pill h-pill-accent pointer-cursor mr-1 upload-button" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Upload cover image')); ?>">
                             <?php echo $__env->make('elements.icon',['icon'=>'image','variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </span>
                            <span class="h-pill h-pill-accent pointer-cursor" onclick="ProfileSettings.removeUserAsset('cover')" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Remove cover image')); ?>">
                            <?php echo $__env->make('elements.icon',['icon'=>'close','variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="card avatar-holder">
                <img class="card-img-top" src="<?php echo e(Auth::user()->avatar); ?>">
                <div class="card-img-overlay d-flex justify-content-center align-items-center">
                    <div class="actions-holder d-none">
                        <div class="d-flex">
                        <span class="h-pill h-pill-accent pointer-cursor mr-1 upload-button" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Upload avatar')); ?>">
                            <?php echo $__env->make('elements.icon',['icon'=>'image','variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </span>
                            <span class="h-pill h-pill-accent pointer-cursor" onclick="ProfileSettings.removeUserAsset('avatar')" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Remove avatar')); ?>">
                             <?php echo $__env->make('elements.icon',['icon'=>'close','variant'=>'medium'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if(session('success')): ?>
        <div class="alert alert-success text-white font-weight-bold mt-2" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="form-group">
        <label for="username"><?php echo e(__('Username')); ?></label>
        <input class="form-control <?php echo e($errors->has('username') ? 'is-invalid' : ''); ?>" id="username" name="username" aria-describedby="emailHelp" value="<?php echo e(Auth::user()->username); ?>">
        <?php if($errors->has('username')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('username')); ?></strong>
            </span>
        <?php endif; ?>

    </div>
    <div class="form-group">
        <label for="name"><?php echo e(__('Full name')); ?></label>
        <input class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" id="name" name="name" aria-describedby="emailHelp" value="<?php echo e(Auth::user()->name); ?>">
        <?php if($errors->has('name')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('name')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <div class="d-flex justify-content-between">
            <label for="bio">
                <?php echo e(__('Bio')); ?>

            </label>
            <div>
                <?php if(getSetting('ai.open_ai_enabled')): ?>
                    <a href="javascript:void(0)" onclick="<?php echo e("AiSuggestions.suggestDescriptionDialog();"); ?>" data-toggle="tooltip" data-placement="left" title="<?php echo e(__('Use AI to generate your description.')); ?>"><?php echo e(trans_choice("Suggestion",2)); ?></a>
                <?php endif; ?>
            </div>
        </div>
        <textarea class="form-control <?php echo e($errors->has('bio') ? 'is-invalid' : ''); ?>" id="bio" name="bio" rows="3" spellcheck="false"><?php echo e(Auth::user()->bio); ?></textarea>
        <?php if($errors->has('bio')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('bio')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="birthdate"><?php echo e(__('Birthdate')); ?></label>
        <input type="date" class="form-control <?php echo e($errors->has('location') ? 'is-invalid' : ''); ?>" id="birthdate" name="birthdate" aria-describedby="emailHelp"  value="<?php echo e(Auth::user()->birthdate); ?>" max="<?php echo e($minBirthDate); ?>">
        <?php if($errors->has('birthdate')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('birthdate')); ?></strong>
            </span>
        <?php endif; ?>
    </div>

    <div class="d-flex flex-row">
        <div class="<?php echo e(getSetting('profiles.allow_gender_pronouns') ? 'w-50' : 'w-100'); ?> pr-2">
            <div class="form-group">
                <label for="gender"><?php echo e(__('Gender')); ?></label>
                <select class="form-control" id="gender" name="gender" >
                    <option value=""></option>
                    <?php $__currentLoopData = $genders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($gender->id); ?>" <?php echo e(Auth::user()->gender_id == $gender->id ? 'selected' : ''); ?>><?php echo e(__($gender->gender_name)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('gender')): ?>
                    <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('gender')); ?></strong>
            </span>
                <?php endif; ?>
            </div>
        </div>

        <?php if(getSetting('profiles.allow_gender_pronouns')): ?>
            <div class="w-50 pl-2">
                <div class="form-group">
                    <label for="pronoun"><?php echo e(__('Gender pronoun')); ?></label>
                    <input class="form-control <?php echo e($errors->has('location') ? 'is-invalid' : ''); ?>" id="pronoun" name="pronoun" aria-describedby="emailHelp"  value="<?php echo e(Auth::user()->gender_pronoun); ?>">
                    <?php if($errors->has('pronoun')): ?>
                        <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($errors->first('pronoun')); ?></strong>
                    </span>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

    </div>

    <div class="d-flex flex-row">
        <div class="form-group w-50 pr-2">
            <label for="country"><?php echo e(__('Country')); ?></label>
            <select class="form-control" id="country" name="country" >
                <option value=""></option>
                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($country->id); ?>" <?php echo e(Auth::user()->country_id == $country->id ? 'selected' : ''); ?>><?php echo e(__($country->name)); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php if($errors->has('country')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('country')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group w-50 pl-2">
            <label for="location"><?php echo e(__('Location')); ?></label>
            <input class="form-control <?php echo e($errors->has('location') ? 'is-invalid' : ''); ?>" id="location" name="location" aria-describedby="emailHelp"  value="<?php echo e(Auth::user()->location); ?>">
            <?php if($errors->has('location')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('location')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-group">
        <label for="website" value="<?php echo e(Auth::user()->website); ?>"><?php echo e(__('Website URL')); ?></label>
        <input type="url" class="form-control <?php echo e($errors->has('website') ? 'is-invalid' : ''); ?>" id="website" name="website" aria-describedby="emailHelp" value="<?php echo e(Auth::user()->website); ?>">
        <?php if($errors->has('website')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('website')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
    <button class="btn btn-primary btn-block rounded mr-0" type="submit"><?php echo e(__('Save')); ?></button>
</form>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/public_html/resources/views/elements/settings/settings-profile.blade.php ENDPATH**/ ?>